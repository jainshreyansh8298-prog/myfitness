<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (session()->has('locale')) {
            app()->setLocale(session()->get('locale'));
        }

        Paginator::useBootstrap();

        // Force HTTPS in production or behind ngrok/localtunnel proxies
        if (config('app.env') !== 'local' || request()->header('x-forwarded-proto') == 'https' || str_contains(request()->header('host', ''), 'ngrok') || str_contains(request()->header('host', ''), 'loca.lt')) {
            \Illuminate\Support\Facades\URL::forceScheme('https');
        }
    }
}
