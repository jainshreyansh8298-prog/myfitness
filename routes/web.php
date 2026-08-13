<?php

use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\Front\OrderController;
use App\Http\Controllers\Front\PagesController;
use App\Http\Controllers\UserDashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\PaymentController;


# ---------- Frontend ----------
// Route::get('test',function(){
//     return Auth::id();
// });
// use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::get('/fix-paths', function () {
    try {
        // Artisan::call('migrate');
        // Artisan::call('db:seed');
        // Artisan::call('view:clear');
        // Artisan::call('cache:clear');
        // Artisan::call('route:clear');
        Artisan::call('storage:link');
        return nl2br("✅ All caches cleared and storage linked successfully.\n\nPath issues fixed.");
    } catch (Exception $e) {
        return '❌ Error: ' . $e->getMessage();
    }
});
Route::get('/', [PagesController::class, 'home'])->name('front.home');
Route::get('contact', [PagesController::class, 'contact'])->name('front.contact');
Route::get('about', [PagesController::class, 'about'])->name('front.about');
Route::get('services', [PagesController::class, 'services'])->name('front.services');
Route::get('services/{service}', [PagesController::class, 'serviceDetails'])->name('front.serviceDetails');
Route::get('blogs', [PagesController::class, 'blogs'])->name('front.blogs');
Route::get('blogs/{blog}', [PagesController::class, 'singleBlog'])->name('front.blogDetails');
Route::get('privacy-policy', [PagesController::class, 'privacyPolicy'])->name('front.privacyPolicy');
Route::get('terms-conditions', [PagesController::class, 'termsConditions'])->name('front.termsConditions');
Route::get('faq', [PagesController::class, 'faq'])->name('front.faq');
Route::get('cookie-policy', [PagesController::class, 'cookiePolicy'])->name('front.cookiePolicy');
Route::get('service-delivery', [PagesController::class, 'serviceDelivery'])->name('front.serviceDelivery');
Route::post('contact-forms/create', [ContactFormController::class, 'store'])
    ->name('form.store');
Route::post('discount-lead/store', [\App\Http\Controllers\Front\DiscountLeadFrontController::class, 'store'])
    ->name('front.discount.store');
Route::post('create-order/{service}/book',[OrderController::class , 'create'])
    ->middleware(['auth','verified','has-details'])
    ->name('front.order.create');

# ---------- Guest Only ----------
Route::middleware('guest')->group(function () {
    Route::get('login', [PagesController::class, 'login'])->name('front.login');
    Route::get('register', [PagesController::class, 'register'])->name('front.register');
    Route::get('forgot',[PagesController::class , 'forgot'])->name('front.forgot');
});

# ---------- Authenticated User ----------
Route::middleware('auth')->as('front.')->prefix('user')->group(function () {
    Route::get('details-create',[UserDashboardController::class , 'create'])->name('details.create');
    Route::post('details-store',[UserDashboardController::class , 'store'])->name('details.store');
    Route::get('profile', [UserDashboardController::class, 'userProfile'])->name('profile');
    Route::post('profile/update', [UserDashboardController::class, 'userProfileUpdate'])->name('profile-update');
    Route::get('orders', [UserDashboardController::class, 'userOrders'])->name('orders');
    Route::get('dashboard', [UserDashboardController::class, 'userDashboard'])->name('dashboard');
    // Route::get('address', [UserDashboardController::class, 'userAddress'])->name('address');
    // Route::get('address-create', [UserDashboardController::class, 'userAddressCreate'])->name('address-create');
    // Route::post('address-store', [UserDashboardController::class, 'userAddressStore'])->name('address-store');
    // Route::get('address-edit/{address}', [UserDashboardController::class, 'userAddressEdit'])->name('address-edit');
    // Route::put('address-update/{address}', [UserDashboardController::class, 'userAddressUpdate'])->name('address-update');
    // Route::delete('address-delete/{address}', [UserDashboardController::class, 'userAddressDelete'])->name('address-delete');
    Route::get('change-password', [UserDashboardController::class, 'userChangePassword'])->name('change-password');
    Route::put('change-password', [UserDashboardController::class, 'changePassword'])->name('change-password.update');
    Route::get('payments', [UserDashboardController::class, 'userPayments'])->name('payments');
    Route::get('/payment/success', [PaymentController::class, 'success'])->name('payment.success');
    Route::get('/payment/cancel', [PaymentController::class, 'cancel'])->name('payment.cancel');
});

require __DIR__ . '/dashboard.php';
require __DIR__ . '/auth.php';
