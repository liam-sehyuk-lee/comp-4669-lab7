<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TaxService;

class TaxController extends Controller
{
    public function calculateTax(Request $request)
    {
        // Not ideal: Instantiating the service directly
        $taxService = new TaxService();
        $amount = $request->input('amount');
        $tax = $taxService->calculateTax($amount);

        return response()->json(['tax' => $tax]);
    }

    public function getTaxRate(Request $request)
    {
        // Not ideal: Instantiating the service directly
        $taxService = new TaxService();
        $country = $request->input('country');
        $rate = $taxService->getTaxRate($country);

        return response()->json(['rate' => $rate]);
    }

    public function applyDiscount(Request $request)
    {
        // Not ideal: Instantiating the service directly
        $taxService = new TaxService();
        $amount = $request->input('amount');
        $discount = $request->input('discount');
        $finalAmount = $taxService->applyDiscount($amount, $discount);

        return response()->json(['finalAmount' => $finalAmount]);
    }

    public function generateTaxReport()
    {
        $taxService = new TaxService();
        $report = $taxService->generateTaxReport();

        return response()->json(['report' => $report]);
    }
}
