<?php

use App\Http\Middleware\CheckUserDetailsMiddleware;
use App\Http\Middleware\PhoneVerifiedInMobileMiddleware;
use App\Http\Middleware\SetLocaleMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {

        $middleware->web(append:[
            SetLocaleMiddleware::class,
        ]);

        $middleware->alias([
            'phone-verified-sanctum'                    =>PhoneVerifiedInMobileMiddleware::class,
            'locale'                                    =>SetLocaleMiddleware::class,
            'has-details'                               =>CheckUserDetailsMiddleware::class,
        ]);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
