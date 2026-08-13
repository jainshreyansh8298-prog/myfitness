<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\DiscountLead;

class DiscountLeadController extends Controller
{
    public function index()
    {
        $leads = DiscountLead::latest()->paginate(20);
        return view('admin.discount-leads.index', compact('leads'));
    }

    public function destroy(DiscountLead $lead)
    {
        $lead->delete();
        return redirect()->back()->with('success', 'Lead email deleted.');
    }
}
