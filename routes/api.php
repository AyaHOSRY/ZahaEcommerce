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
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\DepartmentController;
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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::post('/logout', [AuthController::class, 'logout']);

    //products//
//Route::apiResource('products', ProductController::class);
Route::middleware(['auth:api', 'SellerMiddleware'])->group(function(){
    Route::post('/products',[ProductController::class , 'store'])->name('products.store');
    Route::put('/products/{product}',[ProductController::class , 'update'])->name('products.update');
    Route::delete('/products/{product}',[ProductController::class , 'destroy'])->name('products.destroy');
});
Route::middleware('auth:api')->group(function(){
    Route::get('/products',[ProductController::class , 'index'])->name('products.index');
    Route::get('/products/{product}',[ProductController::class , 'show'])->name('products.show');
    
});
//color
//Route::apiResource('colors', ColorController::class);
Route::middleware(['auth:api', 'AdminMiddleware'])->group(function(){
    Route::post('/colors',[ColorController::class , 'store'])->name('colors.store');
    Route::put('/colors/{color}',[ColorController::class , 'update'])->name('colors.update');
    Route::delete('/colors/{color}',[ColorController::class , 'destroy'])->name('colors.destroy');
});
Route::middleware('auth:api')->group(function(){
    Route::get('/colors',[ColorController::class , 'index'])->name('colors.index');
    //Route::get('/colors/{color}',[ColorController::class , 'show'])->name('colors.show');
    
});
//size
Route::middleware(['auth:api', 'AdminMiddleware'])->group(function(){
    Route::post('/sizes',[SizeController::class , 'store'])->name('sizes.store');
    Route::put('/sizes/{size}',[SizeController::class , 'update'])->name('sizes.update');
    Route::delete('/sizes/{size}',[SizeController::class , 'destroy'])->name('sizes.destroy');
});
Route::middleware('auth:api')->group(function(){
    Route::get('/sizes',[SizeController::class , 'index'])->name('sizes.index');
});
//department
Route::middleware(['auth:api', 'AdminMiddleware'])->group(function(){
    Route::post('/departments',[DepartmentController::class , 'store'])->name('departments.store');
    Route::put('/departments/{department}',[DepartmentController::class , 'update'])->name('departments.update');
    Route::delete('/departments/{department}',[DepartmentController::class , 'destroy'])->name('departments.destroy');
});
Route::middleware('auth:api')->group(function(){
    Route::get('/departments',[DepartmentController::class , 'index'])->name('departments.index');
});

////
Route::apiResource('products/{product}/reviews', ReviewController::class);




//Route::apiResource('occasions', OccasionController::class);
Route::post('/occasions', [OccasionController::class , 'store'])->name('occasions.store')->middleware('SellerMiddleware');
Route::get('/occasions', [OccasionController::class , 'index'])->name('occasions.index');
Route::apiResource('users', UserController::class);
Route::apiResource('users/{user}/addresses', AddressController::class);

Route::apiResource('products/{product}/colors', ProuductColorController::class);