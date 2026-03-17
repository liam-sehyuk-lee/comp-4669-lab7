<?php

namespace Tests\Feature;

use Mockery;
use App\Services\PhotoSearchService;
use Tests\Stubs\SubscriptionServiceStub;
use Tests\Stubs\SubscriptionServiceSub;
use Tests\TestCase;

class SubscriptionTest extends TestCase {

    protected function tearDown(): void
    {
        parent::tearDown();
        Mockery::close();
    }

    public function testSubscription() {
        // Bind the mock to the service container
        $this->app->instance('subscription-service', new SubscriptionServiceStub);

        // Call the endpoint
        $response = $this->postJson('api/v1/subscription');

        // Assert the response
        $response->assertStatus(200)
                 ->assertJson(
                     ['message' => 'You are now subscribed.']
                 );
    }

}
