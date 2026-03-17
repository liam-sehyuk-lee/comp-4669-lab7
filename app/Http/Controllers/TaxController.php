<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\TaxServiceContract;

class TaxController extends Controller
{
    protected $taxService;

    public function __construct(TaxServiceContract $taxService)
    {
        $this->taxService = $taxService;
    }

    public function calculateTax(Request $request)
    {
        $amount = $request->input('amount');
        $tax = $this->taxService->calculateTax($amount);

        return response()->json(['tax' => $tax]);
    }

    public function getTaxRate(Request $request)
    {
        $country = $request->input('country');
        $rate = $this->taxService->getTaxRate($country);

        return response()->json(['rate' => $rate]);
    }

    public function applyDiscount(Request $request)
    {
        $amount = $request->input('amount');
        $discount = $request->input('discount');
        $finalAmount = $this->taxService->applyDiscount($amount, $discount);

        return response()->json(['finalAmount' => $finalAmount]);
    }

    public function generateTaxReport()
    {
        $report = $this->taxService->generateTaxReport();

        return response()->json(['report' => $report]);
    }
}