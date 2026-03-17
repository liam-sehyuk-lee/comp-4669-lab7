<?php

use App\Http\Controllers\PhotoController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\TaxController;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('v1/photos', [PhotoController::class, 'index']);

Route::post('v1/subscription', [SubscriptionController::class, 'store']);

Route::post('/v1/calculate-tax', [TaxController::class, 'calculateTax']);
Route::get('/v1/tax-rate', [TaxController::class, 'getTaxRate']);
Route::post('/v1/apply-discount', [TaxController::class, 'applyDiscount']);
Route::get('/v1/tax-report', [TaxController::class, 'generateTaxReport']);
