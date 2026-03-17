<?php

namespace Tests\Feature;

use Mockery;
use App\Services\PhotoSearchService;
use Tests\TestCase;

class PhotoSearchTest extends TestCase {

    protected function tearDown(): void
    {
        parent::tearDown();
        Mockery::close();
    }

    public function testSearch() {
        $mockService = Mockery::mock(PhotoSearchService::class);
        $mockService->shouldReceive('search')
                    ->once()
                    ->with('cats')
                    ->andReturn([
                        ['id' => 1, 'filename' => 'Cat.jpg'],
                        ['id' => 2, 'filename' => 'Cat2.jpg'],
                    ]);

        // Bind the mock to the service container
        $this->app->instance(PhotoSearchService::class, $mockService);

        // Call the endpoint
        $response = $this->getJson('api/v1/photos?query=cats');

        // Assert the response
        $response->assertStatus(200)
                 ->assertJson([
                     ['id' => 1, 'filename' => 'Cat.jpg'],
                     ['id' => 2, 'filename' => 'Cat2.jpg'],
                 ]);
    }

}