<?php

namespace App\Http\Controllers\Front;


class PaymentController
{
    public function success()
    {
        $message = "Payment completed successfully!";
        return view('front.payment.success', compact('message'));
    }

    public function cancel()
    {
        $message = "Payment was cancelled.";
        return view('front.payment.cancel', compact('message'));
    }
}