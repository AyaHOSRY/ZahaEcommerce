<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Http\Resources\CartResource;
use App\Http\Resources\ProductResource;
use App\Http\Requests\ProductCartRequest;

class ProductCartController extends Controller
{
    public function index($id)
    { 
        $user = auth('api')->user();
        return CartResource::Collection($user->carts);
    }


    public function store(ProductCartRequest $request, Cart $cart, Product $product)
    {
       // $cart = Cart::find($id);
       $discountPrice = $product->discount/100 ;
        $ProductCart =$cart->products()->attach($product->id,[
            'count' => $request->count,
            'price'=>$product->price,
            'discount'=>$product->discount,
            'total'=>$product->discount ? ($product->price - $discountPrice) * $request->count : $product->price * $request->count
        ]);
        return response([
            'data'=> 'success'
        ],201);
    }
}
