<?php

namespace App\Services;

use App\Contracts\SubscriptionServiceContract;
use App\Models\Subscription;
use Illuminate\Support\Facades\Log;

class SubscriptionService implements SubscriptionServiceContract {

    public function subscribe(): Subscription {
        Log::info('Subscribing using the "real" SubscriptionService... this is expensive in terms of time and money.');
        sleep(3);
        return new Subscription();
    }

    public function chargeCustomer(int $customerId, int $amountInCentsUSD): bool {
        Log::info("Charging customer ID $customerId \"real\" SubscriptionService...");
        sleep(3);
        return true; // indicating success
    }

}
