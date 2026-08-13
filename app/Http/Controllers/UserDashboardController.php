<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Order;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserDashboardController extends Controller
{
    public function create()
    {
        return view('front.user-details', [
            'areas'                     => Area::select('id', 'name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'phone'             => 'required|unique:user_details,phone',
            'age'               => 'required|integer|min:18|max:120',
            'address1'          => 'required|integer|min:1',
            'state'             => 'required|exists:areas,id',
            'city'              => 'required|string',
            'po_box'            => 'required|string',
        ]);

        $user = Auth::user();

        if ($user->details()->exists()) {
            return redirect()->back()->with('error', __('Already User Details Registered'));
        }

        $user->details()->create([
            'phone'                 => $request->phone,
            'age'                   => $request->age,
            'apartment_number'      => $request->address1,
            'area'                  => Area::where('id', $request->state)->first()->name,
            'city'                  => $request->city,
            'po_box'                => $request->po_box,
        ]);


        $order_id = Cookie::get('order_id');

        if($order_id){
            return redirect()->route('front.serviceDetails',$order_id);
        }
        return redirect()->route('front.services');
    }

    public function userDashboard()
    {
        $user = Auth::user();
        $latest_orders = Order::with(['service'])
            ->where('user_id', $user->id)->latest()->paginate(5);
        return view(
            'front.user-dashboard.dashboard',
            [
                // 'user'                      =>$user,
                'latest_orders'             => $latest_orders,
            ]
        );
    }

    public function userOrders()
    {
        $user = Auth::user();

        $orders = Order::with('service')->where('user_id', $user->id)->get();

        $calc = [
            'pending'           => $orders->where('status', 'pending')->count(),
            'running'           => $orders->where('status', 'running')->count(),
            'completed'           => $orders->where('status', 'completed')->count(),
            'cancelled'           => $orders->where('status', 'cancelled')->count(),
        ];

        return view('front.user-dashboard.orders', compact('calc', 'orders'));
    }

    public function userPayments()
    {
        $user = Auth::user();
        $payments = Order::with('service')->where('user_id', $user->id)->latest()->paginate(10);
        
        return view('front.user-dashboard.payments', compact('payments'));
    }

    public function userChangePassword()
    {
        return view('front.user-dashboard.change-password');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'old_password'                  => 'required|string|min:8',
            'new_password'                  => [
                'required',
                // Password::min(8)->numbers()->letters()->symbols()->uncompromised()
            ],
            'cnf_password'                  => 'required|same:new_password',
        ]);

        $user = Auth::user();

        $check = Hash::check($request->old_password, $user->password);

        if (!$check) {
            return redirect()->back()->withInput()
                ->with('error', 'Password Not Match');
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('front.dashboard')
            ->with('success', 'Password Changed');
    }

    public function userProfile()
    {
        return view('front.user-dashboard.profile', [
            'user'                  => Auth::user()->load('details'),
            'areas'                 => Area::select('id', 'name')->get(),
        ]);
    }

    public function userProfileUpdate(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            "first_name"        => "required|string|max:100",
            "last_name"         => "required|string|max:100",
            "phone"             => 'required|string|max:15',
            "dob"               => "required|integer|min:12|max:120",
            "address1"          => "required|string",
            "state"             => "required|exists:areas,id",
            "city"              => "required|string",
            "zip"               => "required|integer|min:1",
        ]);

        $user->update([
            'name'              => $request->first_name . ' ' . $request->last_name,
        ]);

        UserDetail::where('user_id', $user->id)->update([
            'phone'             => $request->phone,
            'age'               => $request->dob,
            'address'           => $request->address1,
            'area'             => Area::where('id', $request->state)->first()->name,
            'city'              => $request->city,
            'po_box'            => $request->zip,
        ]);

        return redirect()->route('front.dashboard')
            ->with('success', __('User Details Updated'));
    }
}
