<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Order;
use App\Http\Resources\OrderResource;
use App\Http\Resources\ProductResource;
use App\Http\Requests\ProductOrderRequest;
use Auth;
class ProductOrderController extends Controller
{
    public function index()
    { 
        $user = auth('api')->user();
        return OrderResource::Collection($user->orders);
    }
 
    public function orderProducts(Product $product)
    { 
        return OrderResource::Collection($product->orders);
    }

    public function store(ProductOrderRequest $request, Order $order, Product $product)
    {
         
       $discountPrice = $product->discount/100 ;
        $ProductOrder =$order->products()->attach($product->id,[
            'count' => $request->count,
            'price'=>$product->price,
            'discount'=>$product->discount,
            'total'=>$product->discount ? ($product->price - ($product->price*$discountPrice)) * $request->count : $product->price * $request->count
        ]);
        return response([
            'data'=> 'success'
        ],201);
    }
}
