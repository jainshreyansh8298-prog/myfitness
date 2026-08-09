<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Front\OrderController;

Route::post('stripe/webhook', [OrderController::class, 'handle']);