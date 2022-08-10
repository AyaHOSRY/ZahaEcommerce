<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Http\Requests\StoreorderRequest;
use App\Http\Requests\UpdateorderRequest;
use App\Http\Resources\OrderResource;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth('api')->user();
        return OrderResource::Collection($user->orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreorderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreorderRequest $request)
    {
        $user = auth('api')->user()->id;
        $order = new Order;
        $order->user_id = $user;
        $order->sub_total = $request->sub_total;
        $order->shipping = $request->shipping;
        $order->total = $request->total;

        $order->save();

        return response([
            'data'=> new OrderResource($order)
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(order $order)
    {
        //return $order->products;   //get one order products
        return new OrderResource($order);  //get the order
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateorderRequest  $request
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateorderRequest $request, order $order)
    {
      //  $order= Order::find($id);
        //$this->CheckUser($cart);
         $products_price_total = $order->products()->sum('total') ;
       
         $order->sub_total = $products_price_total;
         $order->shipping = $request->shipping;
         $order->total = $products_price_total + $request->shipping;
         $order->save();
         return response([
            'data'=> new OrderResource($order)
         ],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(order $order)
    {
        $order->delete();
        return response(null,402);
    }
}
