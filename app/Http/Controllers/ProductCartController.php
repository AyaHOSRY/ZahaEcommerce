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
    public function index()
    { 
        $user = auth('api')->user();
        return CartResource::Collection($user->carts);
    }

    
    public function store(ProductCartRequest $request, Cart $cart, Product $product)
    {
       // $cart = Cart::find($id);
        $ProductCart =$cart->products()->attach($product->id,[
            'count' => $product->count,
            'price'=>$product->price,
            'discount'=>$product->discount
        ]);
        return response([
            'data'=> 'success'
        ],201);
    }
}
