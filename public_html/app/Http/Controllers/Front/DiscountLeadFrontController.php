<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\DiscountLead;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class DiscountLeadFrontController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
        ]);

        $code = SiteSetting::get('popup_discount_code', 'FIRST10');

        DiscountLead::firstOrCreate(
            ['email' => $request->email],
            ['discount_code' => $code]
        );

        return response()->json([
            'success' => true,
            'message' => 'Congratulations! Your 10% discount code has been unlocked.',
            'discount_code' => $code
        ]);
    }
}
