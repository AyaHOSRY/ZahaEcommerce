<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductOrderController extends Controller
{
    public function index($id)
    { 
        $user = auth('api')->user();
        return OrderResource::Collection($user->orders);
    }


    public function store(ProductOrderRequest $request, Order $order, Product $product)
    {
       // $cart = Cart::find($id);
       $discountPrice = $product->discount/100 ;
        $ProductOrder =$order->products()->attach($product->id,[
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
