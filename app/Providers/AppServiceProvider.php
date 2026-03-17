<?php

namespace App\Providers;

use App\Contracts\SubscriptionServiceContract;
use App\Services\SubscriptionService as ServicesSubscriptionService;
use Illuminate\Support\ServiceProvider;
use SubscriptionService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(
            'subscription-service', 
            fn() => new ServicesSubscriptionService
        );
        // The above arrow function usage is equivalent to eg.
        // $this->app->singleton('subscription-service', function() {
        //     return new ServicesSubscriptionService;
        // });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
