<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\ProductController;

Route::prefix('v1')->group(function () {

    // Public admin login
    Route::post('/admin/login', [AdminAuthController::class, 'login']);

    // Protected admin routes (admin only)
    Route::middleware(['auth:sanctum', 'ability:admin'])->group(function () {

        Route::post('/admin/logout', [AdminAuthController::class, 'logout']);

        Route::apiResource('products', ProductController::class)
            ->except(['create', 'edit']);
    });

});
