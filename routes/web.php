<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;

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
    Route::get('/login', [Admin\LoginController::class, 'login']);
    Route::get('/logout',[Admin\LoginController::class, 'logout']);
    Route::post('/authenticate', [Admin\LoginController::class, 'authenticate']);
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard',[Admin\DashboardController::class, 'index']);

        Route::get('/user/create',[Admin\UserController::class, 'create']);
        Route::post('/user/create',[Admin\UserController::class, 'store']);

        
    });
});
