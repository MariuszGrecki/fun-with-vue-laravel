<?php

use App\Http\Controllers\FeatureRequestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HealthCheckController;

Route::get('/health', [HealthCheckController::class, 'check'])->name('health.check');

Route::get('/products/{product}/feature-requests', [FeatureRequestController::class, 'index']);
Route::post('/products/{product}/feature-requests', [FeatureRequestController::class, 'store']);