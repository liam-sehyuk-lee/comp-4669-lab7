<?php

namespace App\Providers;

use App\Contracts\TaxServiceContract;
use App\Services\TaxService;
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
        $this->app->bind(TaxServiceContract::class, TaxService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
