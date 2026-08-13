<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Stripe\Stripe;
use Stripe\Checkout\Session as CheckoutSession;
use Stripe\Webhook;
use Stripe\Exception\SignatureVerificationException;


class OrderController extends Controller
{
    public function create(Request $request, Service $service)
    {
        $request->validate([
            'sessions_number'           => 'required|integer|min:1',
            'is_online'                 => 'required|boolean',
            'area_id'                   => 'nullable|required_if:is_online,0|exists:areas,id',
            'dtime'                     => 'required|date_format:Y-m-d H:i|after:today',
            'promo_code'                => 'nullable|string'
        ]);
        $user = Auth::user();

        $order = Order::create([
            'user_id'                   => $user->id,
            'service_id'                => $service->id,
            'status'                    => 'pending',
            'payment_status'            => 'pending',
            'sessions_number'           => $request->sessions_number,
            'area_id'                   => $request->area_id,
            'first_session_date'        => Carbon::parse($request->dtime),
            'type'                      => $request->is_online ? 'online' : 'offline',
        ]);

        
        if(! $user->details()->exists())
        {
            Cookie::queue('order_id', $order->id, 60);
            return redirect()->route('front.details.create');
        }
        
        Stripe::setApiKey(config('stripe.secret'));

        $totalAmount = $service->price_after * $request->sessions_number;
        $validPromoCode = \App\Models\SiteSetting::get('popup_discount_code', 'FIRST10');
        
        if ($request->promo_code && strtoupper(trim($request->promo_code)) === strtoupper(trim($validPromoCode))) {
            $totalAmount = $totalAmount * 0.90; // Apply 10% discount
        }

        $session = CheckoutSession::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'aed',
                    'product_data' => [
                        'name' => $service->name,
                    ],
                    'unit_amount' => (int) round($totalAmount * 100), 
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'metadata' => [
                'order_id' => $order->id,
                'user_id' => $user->id,
            ],
            'success_url' => route('front.payment.success'),
            'cancel_url'  => route('front.payment.cancel'),
        ]);

        Log::info('CHECKOUT URL: ' . $session->url);

        return redirect($session->url);
    }
    
    
    public function handle(Request $request)
    {
        \Log::info($request->all());
        $payload = $request->getContent();
        $signature = $request->header('Stripe-Signature');
        $endpointSecret = env('STRIPE_WEBHOOK_SECRET');

        try {
            $event = Webhook::constructEvent(
                $payload,
                $signature,
                $endpointSecret
            );
        } catch (SignatureVerificationException $e) {
            return response('Invalid signature', 400);
        }

        switch ($event->type) {
            case 'checkout.session.completed':
                $this->handleCheckoutCompleted($event->data->object);
                break;

            case 'checkout.session.expired':
                $this->handleCheckoutExpired($event->data->object);
                break;
        }

        return response('Webhook received', 200);
    }

    private function handleCheckoutCompleted($session)
    {
        $orderId = $session->metadata->order_id;

        $order = Order::find($orderId);
        if (! $order) {
            return;
        }

        $order->update([
            'payment_status' => 'success',
            'status'         => 'running',
        ]);
    }

    private function handleCheckoutExpired($session)
    {
        $orderId = $session->metadata->order_id;

        $order = Order::find($orderId);
        if (! $order) {
            return;
        }

        $order->update([
            'payment_status' => 'failed',
            'status'         => 'cancelled',
        ]);
    }
}
