<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [\App\Http\Controllers\API\AuthController::class, 'getToken']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'products', 'middleware' => ['auth:sanctum']], function () {
    Route::get('/all', [\App\Http\Controllers\API\ProductController::class, 'getAll']);
    Route::get('/stock', [\App\Http\Controllers\API\ProductController::class, 'getProductsInStock']);
    Route::get('/{productId}', [\App\Http\Controllers\API\ProductController::class, 'getProduct']);
});

Route::group(['prefix' => 'payments', 'middleware' => ['auth:sanctum']], function () {
    Route::post('/callback', [\App\Http\Controllers\API\PaymentController::class, 'callback']);
    Route::get('/status/{orderId}', [\App\Http\Controllers\API\PaymentController::class, 'orderStatus']);
});
