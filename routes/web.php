<?php

use App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SubscriptionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('admin')->group(function () {
    Route::get('/login', [LoginController::class, 'login']);
    Route::get('/logout',[LoginController::class, 'logout']);
    Route::post('/authenticate', [LoginController::class, 'authenticate']);
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard',[Admin\DashboardController::class, 'index']);

        Route::get('/user/create',[Admin\UserController::class, 'create']);
        Route::post('/user/create',[Admin\UserController::class, 'store']);

        Route::prefix('product')->group(function () {
            Route::get('/',[Admin\ProductController::class, 'index']);
            Route::get('/create',[Admin\ProductController::class, 'create']);
            Route::post('/',[Admin\ProductController::class, 'store']);

            Route::prefix('{product}')->group(function () {
                // Route::get('/',[Admin\ProductController::class, 'show']);
                Route::get('/pricing',[Admin\ProductPricingController::class, 'create']);
                Route::post('/pricing',[Admin\ProductPricingController::class, 'store']);
            });
        });

        Route::prefix('pricing')->group(function () {
            Route::get('/',[Admin\PricingController::class, 'index']);
            Route::get('/create',[Admin\PricingController::class, 'create']);
            Route::post('/',[Admin\PricingController::class, 'store']);
            Route::get('/{product}',[Admin\PricingController::class, 'show']);
        });
    });
});

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/authenticate', [LoginController::class, 'authenticate']);

Route::middleware('auth')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::get('/product/{product}', [SubscriptionController::class, 'index']);
});
