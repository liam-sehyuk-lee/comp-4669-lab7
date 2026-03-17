<?php

namespace Tests\Feature;

use Mockery;
use Tests\TestCase;
use App\Contracts\TaxServiceContract;

class TaxTest extends TestCase {

    protected function tearDown(): void
    {
        parent::tearDown();
        Mockery::close();
    }

    public function testCalculatingTaxes() {
        $mock = Mockery::mock(TaxServiceContract::class);
        $mock->shouldReceive('calculateTax')->once()->with(1000)->andReturn(150.0);
        $this->app->instance(TaxServiceContract::class, $mock);

        $response = $this->postJson('/api/v1/calculate-tax', ['amount' => 1000]);
        $response->assertOk()
                 ->assertJson(['tax' => 150.0]);
    }

    public function testTaxRateRetrieval() {
        $mock = Mockery::mock(TaxServiceContract::class);
        $mock->shouldReceive('getTaxRate')->once()->with('CA')->andReturn(0.13);
        $this->app->instance(TaxServiceContract::class, $mock);

        $response = $this->getJson('/api/v1/tax-rate?country=CA');
        $response->assertOk()
                 ->assertJson(['rate' => 0.13]);
    }

    public function testTaxDiscountCalculation() {
        $mock = Mockery::mock(TaxServiceContract::class);
        $mock->shouldReceive('applyDiscount')->once()->with(1000, 10)->andReturn(900.0);
        $this->app->instance(TaxServiceContract::class, $mock);

        $response = $this->postJson('/api/v1/apply-discount', [
            'amount' => 1000,
            'discount' => 10,
        ]);
        $response->assertOk()
                 ->assertJson(['finalAmount' => 900.0]);
    }

    public function testTaxReport() {
        $mockData = [
            ['date' => '2025-01-01', 'tax_collected' => 5000],
            ['date' => '2025-02-01', 'tax_collected' => 6000],
        ];
        $mock = Mockery::mock(TaxServiceContract::class);
        $mock->shouldReceive('generateTaxReport')->once()->andReturn($mockData);
        $this->app->instance(TaxServiceContract::class, $mock);

        $response = $this->getJson('/api/v1/tax-report');
        $response->assertOk()
                 ->assertJson(['report' => $mockData]);
    }
}