<?php

namespace Tests\Feature;

use Mockery;
use Tests\TestCase;

class TaxTest extends TestCase {

    protected function tearDown(): void
    {
        parent::tearDown();
        Mockery::close();
    }

    public function testCalculatingTaxes() {
        // @todo test the /api/v1/calculate-tax endpoint and ensure there is appropriate mocking/stubbing
        $response = $this->postJson('/api/v1/calculate-tax', ['amount' => '1000']);
        $response->assertOk();
    }

    public function testTaxRateRetrieval() {
        // @todo test the /api/v1/tax-rate endpoint and ensure there is appropriate mocking/stubbing
        $response = $this->getJson('/api/v1/tax-rate?country=CA');
        $response->assertOk();
    }

    public function testTaxDiscountCalculation() {
        // @todo test the /api/v1/apply-discount endpoint and ensure there is appropriate mocking/stubbing
        $response = $this->postJson('/api/v1/apply-discount', [
            'amount' => 1000,
            'discount' => 10,
        ]);
        $response->assertOk();
    }

    public function testTaxReport() {
        // @todo test the /api/v1/tax-report endpoint and ensure there is appropriate mocking/stubbing
        $response = $this->getJson('/api/v1/tax-report');
        $response->assertOk();
    }

}
