<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\OccasionController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ProuductColorController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('products', ProductController::class);
Route::apiResource('products/{product}/reviews', ReviewController::class);
Route::apiResource('occasions', OccasionController::class);
Route::apiResource('users', UserController::class);
Route::apiResource('users/{user}/addresses', AddressController::class);
Route::apiResource('colors', ColorController::class);
Route::apiResource('products/{product}/colors', ProuductColorController::class);