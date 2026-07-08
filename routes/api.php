<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HealthCheckController;

Route::get('/health', [HealthCheckController::class, 'check'])->name('health.check');