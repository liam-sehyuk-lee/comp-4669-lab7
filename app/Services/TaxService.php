<?php

namespace App\Services;

use App\Contracts\TaxServiceContract;

class TaxService implements TaxServiceContract
{
    public function calculateTax(float $amount): float
    {
        // An external service such as 
        sleep(2);
        return $amount * 0.15; // eg. 15% tax
    }

    public function getTaxRate(string $country): float
    {
        sleep(3);

        $rates = [
            'US' => 0.07,
            'CA' => 0.13,
            'UK' => 0.20,
        ];

        return $rates[$country] ?? 0.10;
    }

    public function applyDiscount(float $amount, float $discount): float
    {
        sleep(2);
        return $amount - ($amount * ($discount / 100));
    }

    public function generateTaxReport(): array
    {
        sleep(2);
        return [
            ['date' => '2025-01-01', 'tax_collected' => 5000],
            ['date' => '2025-02-01', 'tax_collected' => 6000],
        ];
    }
}
