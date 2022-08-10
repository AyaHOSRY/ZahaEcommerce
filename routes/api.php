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
use App\Http\Controllers\ProuductSizeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductCartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductOrderController;
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

    
//Route::apiResource('products', ProductController::class);

///Seller
Route::middleware(['auth:api', 'SellerMiddleware'])->group(function(){
    //products//
    Route::post('/products',[ProductController::class , 'store'])->name('products.store');
    Route::put('/products/{product}',[ProductController::class , 'update'])->name('products.update');
    Route::delete('/products/{product}',[ProductController::class , 'destroy'])->name('products.destroy');
    Route::put('department/{department}/details/{detail}',[DetailController::class , 'value_add'])->name('details.value');
    Route::get('/occasions', [OccasionController::class , 'index'])->name('occasions.index');
    Route::apiResource('products/{product}/colors', ProuductColorController::class);
    Route::post('products/{product}/sizes', [ProuductSizeController::class, 'store']);
    Route::get('/products/{product}/sizes', [ProuductSizeController::class, 'get_products_sizes']);
    Route::get('/products/{product}/orders',[ProductOrderController::class , 'orderProducts']);

});
//for any one Auth
Route::middleware('auth:api')->group(function(){
    Route::get('/products',[ProductController::class , 'index'])->name('products.index');
    Route::get('/products/{product}',[ProductController::class , 'show'])->name('products.show');
    Route::get('/colors',[ColorController::class , 'index'])->name('colors.index');
    Route::get('/products/{id}/colors',[ColorController::class , 'product_color'])->name('products.colors');
    Route::get('/sizes',[SizeController::class , 'index'])->name('sizes.index');
    Route::get('/departments',[DepartmentController::class , 'index'])->name('departments.index');
    Route::get('department/{department}/details',[DetailController::class , 'index'])->name('details.index');
    Route::get('products/{product}/reviews',[ReviewController::class , 'index'])->name('reviews.index');
});

//Route::apiResource('colors', ColorController::class);

///Admin
Route::middleware(['auth:api', 'AdminMiddleware'])->group(function(){
    //color
    Route::post('/colors',[ColorController::class , 'store'])->name('colors.store');
    Route::put('/colors/{color}',[ColorController::class , 'update'])->name('colors.update');
    Route::delete('/colors/{color}',[ColorController::class , 'destroy'])->name('colors.destroy');
    //size
    Route::post('/sizes',[SizeController::class , 'store'])->name('sizes.store');
    Route::put('/sizes/{size}',[SizeController::class , 'update'])->name('sizes.update');
    Route::delete('/sizes/{size}',[SizeController::class , 'destroy'])->name('sizes.destroy');
    //department
    Route::post('/departments',[DepartmentController::class , 'store'])->name('departments.store');
    Route::put('/departments/{department}',[DepartmentController::class , 'update'])->name('departments.update');
    Route::delete('/departments/{department}',[DepartmentController::class , 'destroy'])->name('departments.destroy');
    //details
    Route::post('department/{department}/details',[DetailController::class , 'store'])->name('details.store');
    //Route::put('department/{department}/details/{detail}',[DetailController::class , 'update'])->name('details.update');
    Route::delete('department/{department}/details/{detail}',[DetailController::class , 'destroy'])->name('details.destroy');
    //occasion
    Route::post('/occasions', [OccasionController::class , 'store'])->name('occasions.store');
    Route::delete('/occasions/{occasion}', [OccasionController::class , 'destroy'])->name('occasions.destroy');
    //user
    Route::apiResource('/users', UserController::class);
});

/////customer

Route::middleware(['auth:api' , 'CustomMiddleware'])->group(function(){
    //address
Route::apiResource('/addresses', AddressController::class );
//review
Route::post('products/{product}/reviews',[ReviewController::class , 'store'])->name('reviews.store');
Route::put('products/{product}/reviews',[ReviewController::class , 'update'])->name('reviews.update');
Route::delete('products/{product}/reviews',[ReviewController::class , 'destroy'])->name('reviews.destroy');
////wishlist
Route::post('products/{product}/wishlists',[WishlistController::class , 'store'])->name('wishlists.store');
    Route::get('/wishlists',[WishlistController::class , 'index'])->name('wishlists.index');
    Route::get('users/{user}/wishlists/{wishlist}',[WishlistController::class , 'show'])->name('wishlists.show');
    Route::delete('/wishlists/{wishlist}',[WishlistController::class , 'destroy'])->name('wishlists.destroy');
    //cart
    Route::apiResource('/carts',CartController::class );
    Route::post('/carts/{cart}/products/{product}',[ProductCartController::class , 'store'])->name('carts.products');
    Route::get('/carts/{cart}/products',[ProductCartController::class , 'index'])->name('carts.allproducts');
    //orders 
    Route::apiResource('/orders',OrderController::class );
    Route::post('/orders/{order}/products/{product}',[ProductOrderController::class , 'store'])->name('Orders.products');
    Route::get('/orders/{order}/products',[ProductOrderController::class , 'index'])->name('Orders.allproducts');
});


