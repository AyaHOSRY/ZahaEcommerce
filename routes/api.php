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
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\DetailController;
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
    Route::get('/products/{id}/colors',[ColorController::class , 'product_color'])->name('products.colors');
    Route::post('/products/{id}/colors/{color}',[ColorController::class , 'product_color_create'])->name('productcolor.create');
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

///
//details
Route::middleware(['auth:api', 'AdminMiddleware'])->group(function(){
    Route::post('department/{department}/details',[DetailController::class , 'store'])->name('details.store');
    Route::put('department/{department}/details/{detail}',[DetailController::class , 'update'])->name('details.update');
    Route::delete('department/{department}/details/{detail}',[DetailController::class , 'destroy'])->name('details.destroy');
});
Route::middleware('auth:api')->group(function(){
    Route::get('department/{department}/details',[DetailController::class , 'index'])->name('details.index');
});

////
//Route::apiResource('products/{product}/reviews', ReviewController::class);
Route::middleware('auth:api')->group(function(){
   
        Route::get('products/{product}/reviews',[ReviewController::class , 'index'])->name('reviews.index');
        Route::post('products/{product}/reviews',[ReviewController::class , 'store'])->name('reviews.store')->middleware('CustomMiddleware');
        Route::put('products/{product}/reviews',[ReviewController::class , 'update'])->name('reviews.update')->middleware('CustomMiddleware');
        Route::delete('products/{product}/reviews',[ReviewController::class , 'destroy'])->name('reviews.destroy')->middleware('CustomMiddleware');

});



//Route::apiResource('occasions', OccasionController::class);
Route::middleware(['auth:api' , 'AdminMiddleware'])->group(function(){
Route::post('/occasions', [OccasionController::class , 'store'])->name('occasions.store');
Route::delete('/occasions/{occasion}', [OccasionController::class , 'destroy'])->name('occasions.destroy');
});
Route::get('/occasions', [OccasionController::class , 'index'])->name('occasions.index')->middleware('auth:api');
Route::apiResource('users', UserController::class)->middleware('AdminMiddleware');
//address
Route::middleware('auth:api')->group(function(){
Route::apiResource('users/{user}/addresses', AddressController::class );
});


////wishlist
Route::middleware(['auth:api', 'CustomMiddleware'])->group(function(){
    Route::post('users/{user}/wishlists',[WishlistController::class , 'store'])->name('wishlists.store');
    Route::get('users/{user}/wishlists',[WishlistController::class , 'index'])->name('wishlists.index');
    Route::get('users/{user}/wishlists/{wishlist}',[WishlistController::class , 'show'])->name('wishlists.show');
    Route::delete('users/{user}/wishlists/{wishlist}',[WishlistController::class , 'destroy'])->name('wishlists.destroy');
});
Route::apiResource('products/{product}/colors', ProuductColorController::class);