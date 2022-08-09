<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Http\Requests\StorecartRequest;
use App\Http\Requests\UpdatecartRequest;
use App\Http\Resources\CartResource;
use Auth;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $user = auth('api')->user();
        return CartResource::Collection($user->carts);
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
     * @param  \App\Http\Requests\StorecartRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorecartRequest $request)
    {
        $user = auth('api')->user()->id;
        $cart = new Cart;
        $cart->user_id = $user;
        $cart->sub_total = $request->sub_total;
        $cart->shipping = $request->shipping;
        $cart->total = $request->total;

        $cart->save();

        return response([
            'data'=> new CartResource($cart)
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(cart $cart)
    {
        return $cart->products;   //get one cart products
        return new CartResource($cart);  //get the cart 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecartRequest  $request
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatecartRequest $request, $id)
    {
         $cart= Cart::find($id);
         $this->CheckUser($cart);
        $products = $cart->products;
         $cart->sub_total = $products->price;
         $cart->shipping = $request->shipping;
         $cart->total = $products->sub_total + $request->shipping;
         $cart->save();
         return response([
            'data'=> new CartResource($cart)
         ],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(cart $cart)
    {
        $this->CheckUser($cart);
        $cart->delete();
        return response(null,402);
    }

    public function CheckUser($cart)
    {
        if(Auth::id() !== $cart->user_id){
            throw new NotBelongToUser;
        }
    }
}
