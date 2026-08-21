<?php

use App\Http\Controllers\FeatureRequestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HealthCheckController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\CommentController;


Route::get('/health', [HealthCheckController::class, 'check'])->name('health.check');

Route::get('/products/{product}/feature-requests', [FeatureRequestController::class, 'index']);
Route::post('/products/{product}/feature-requests', [FeatureRequestController::class, 'store']);

Route::patch('admin/feature-requests/{featureRequest}/status', [FeatureRequestController::class, 'updateStatus']);
Route::post('/feature-requests/{featureRequest}/votes', [VoteController::class, 'store']);
Route::post('/feature-requests/{featureRequest}/comments', [CommentController::class, 'store']);
Route::get('/feature-requests/{featureRequest}', [FeatureRequestController::class, 'show']);


Route::get('/products/{product:slug}', [ProductController::class, 'show']);