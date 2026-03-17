<?php

namespace Tests\Stubs;

use App\Contracts\SubscriptionServiceContract;
use App\Models\Subscription;

class SubscriptionServiceStub implements SubscriptionServiceContract {

    public function subscribe(): Subscription
    {
        return new Subscription();
    }

    public function chargeCustomer(int $customerId, int $amountInCentsUSD): bool
    {
        return true;
    }

}
