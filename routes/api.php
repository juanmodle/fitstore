<?php

use App\Http\Controllers\Api\Admin\CategoryController as AdminCategoryApiController;
use App\Http\Controllers\Api\Admin\CouponController as AdminCouponApiController;
use App\Http\Controllers\Api\Admin\GiveawayController as AdminGiveawayApiController;
use App\Http\Controllers\Api\Admin\OrderController as AdminOrderApiController;
use App\Http\Controllers\Api\Admin\ProductController as AdminProductApiController;
use App\Http\Controllers\Api\AuthController as ApiAuthController;
use App\Http\Controllers\Api\CartItemController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\GiveawayController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\VipSubscriptionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [ApiAuthController::class, 'login']);

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{product}', [ProductController::class, 'show']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{category}', [CategoryController::class, 'show']);
Route::get('/giveaways', [GiveawayController::class, 'index']);
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post}', [PostController::class, 'show']);

Route::middleware('auth:sanctum,web')->group(function () {
    Route::get('/user', fn (Request $request) => $request->user()->load('roles', 'profile'));
    Route::get('/orders', [OrderController::class, 'index']);
    Route::post('/orders', [OrderController::class, 'store']);
    Route::get('/orders/{order}', [OrderController::class, 'show']);
    Route::get('/payments', [PaymentController::class, 'index']);
    Route::post('/payments', [PaymentController::class, 'store']);
    Route::get('/vip-subscription', [VipSubscriptionController::class, 'show']);
    Route::post('/cart/items', [CartItemController::class, 'store']);
    Route::delete('/cart/items/{cartItem}', [CartItemController::class, 'destroy']);

    Route::middleware('permission:manage_products')->group(function () {
        Route::post('/products', [ProductController::class, 'store']);
        Route::put('/products/{product}', [ProductController::class, 'update']);
        Route::patch('/products/{product}', [ProductController::class, 'update']);
        Route::delete('/products/{product}', [ProductController::class, 'destroy']);
    });

    Route::prefix('admin')->name('api.admin.')->middleware('permission:view_reports')->group(function () {
        Route::apiResource('products', AdminProductApiController::class);
        Route::apiResource('categories', AdminCategoryApiController::class);
        Route::apiResource('orders', AdminOrderApiController::class);
        Route::apiResource('coupons', AdminCouponApiController::class);
        Route::apiResource('giveaways', AdminGiveawayApiController::class);
    });
});
