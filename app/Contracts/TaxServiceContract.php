<?php

namespace App\Contracts;

interface TaxServiceContract
{
    public function calculateTax(float $amount): float;
    public function getTaxRate(string $country): float;
    public function applyDiscount(float $amount, float $discount): float;
    public function generateTaxReport(): array;
}