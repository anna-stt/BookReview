<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
public function boot(): void

    {
        RateLimiter::for('reviews', function (Request $request) {

            return Limit::perHour(3)->by(optional($request->user())->id ?: $request->ip());
        });
    }

}
