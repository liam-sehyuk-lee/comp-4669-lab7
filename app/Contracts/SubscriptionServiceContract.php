<?php

namespace App\Contracts;

use App\Models\Subscription;

interface SubscriptionServiceContract {

    public function subscribe(): Subscription;
    public function chargeCustomer(int $customerId, int $amountInCentsUSD): bool;

}
