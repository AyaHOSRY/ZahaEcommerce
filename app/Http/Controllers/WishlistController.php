<?php

namespace App\Http\Controllers;

use App\Models\wishlist;
use App\Http\Requests\StorewishlistRequest;
use App\Http\Requests\UpdatewishlistRequest;
use App\Http\Resources\WishlistResource;
use App\Models\product;
use Auth;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $user = auth('api')->user();
        return WishlistResource::Collection($user->wishlists);
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
     * @param  \App\Http\Requests\StorewishlistRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorewishlistRequest $request, product $product)
    {
        $user = auth('api')->user()->id;
        $wishlist = new Wishlist;
        $wishlist->product_id = $product->id;
        $wishlist->user_id = $user;
        $wishlist->save();
        return response([
            'data'=> new WishlistResource($wishlist)
        ],201);
       /* $wishlist = Wishlist::create($request->all());
        return response([
            'data'=> new WishlistResource($wishlist)
        ],201);*/
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function show(wishlist $wishlist)
    {
        //
    }


    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function edit(wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatewishlistRequest  $request
     * @param  \App\Models\wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatewishlistRequest $request, wishlist $wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(wishlist $wishlist)
    {
        $this->CheckUser($wishlist);
        $wishlist->delete();
        return response(null,402);
    }

    public function CheckUser($wishlist)
    {
        if(Auth::id() !== $wishlist->user_id){
            throw new NotBelongToUser;
        }
    }
}
