<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Blog;
use App\Models\Category;
use App\Models\ContactForm;
use App\Models\Order;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Total counts
        $totalUsers = User::where(function($query) {
            $query->where('role', 'user')
                  ->orWhereNull('role');
        })->count();

        $totalAdmins = User::where(function($query) {
            $query->where('role', 'admin')
                  ->orWhereHas('roles', function($q) {
                      $q->where('name', 'admin');
                  });
        })->count();

        $totalOrders = Order::count();
        $totalServices = Service::count();
        $totalCategories = Category::count();
        $totalAreas = Area::count();
        $totalBlogs = Blog::count();
        $totalContactForms = ContactForm::count();

        // Recent statistics (last 7 days)
        $recentUsers = User::where(function($query) {
            $query->where('role', 'user')
                  ->orWhereNull('role');
        })->where('created_at', '>=', now()->subDays(7))->count();

        $recentOrders = Order::where('created_at', '>=', now()->subDays(7))->count();

        // Pending orders
        $pendingOrders = Order::where(function($query) {
            $query->where('status', 'pending')
                  ->orWhere('status', 'processing')
                  ->orWhere('payment_status', 'pending');
        })->count();

        // Recent contact forms
        $recentContactForms = ContactForm::where('created_at', '>=', now()->subDays(7))->count();

        // Latest orders
        $latestOrders = Order::with(['user', 'service'])
            ->latest()
            ->take(5)
            ->get();

        // Latest users
        $latestUsers = User::where(function($query) {
            $query->where('role', 'user')
                  ->orWhereNull('role');
        })->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalAdmins',
            'totalOrders',
            'totalServices',
            'totalCategories',
            'totalAreas',
            'totalBlogs',
            'totalContactForms',
            'recentUsers',
            'recentOrders',
            'pendingOrders',
            'recentContactForms',
            'latestOrders',
            'latestUsers'
        ));
    }
}
