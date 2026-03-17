<?php

namespace App\Http\Controllers;

use Psr\Container\ContainerInterface;

class SubscriptionController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $subscriptionService = app('subscription-service');
        $subscriptionService->subscribe();
        return response()->json(['message' => 'You are now subscribed.']);
    }

}
