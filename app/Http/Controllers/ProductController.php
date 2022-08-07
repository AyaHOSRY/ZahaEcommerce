<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\User;
use Auth; 

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return ProductResource::collection(Product::all());
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
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
       
       // $data = Product::create($request->validated());
        
         $product = new Product;
         $product->name = $request->name;
         $product->price = $request->price;
         $product->description = $request->description;
         $product->count = $request->count;
         $product->rate = $request->rate;
         $product->discount = $request->discount;
         $product->occasion_id = $request->occasion_id;
         $product->department_id = $request->department_id;
         $product->user_id = auth('api')->user()->id;
         $product->save();
         return response([
            'data'=> new ProductResource($product)
         ],201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
       
        return new ProductResource($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        
       $product= Product::find($id);
        $product->update($request->validated());
        return response([
            'data'=> new ProductResource($product)
         ],201);
        /* $product= Product::find($id);
         $product->name = $request->name;
         $product->price = $request->price;
         $product->description = $request->description;
         $product->count = $request->count;
         $product->rate = $request->rate;
         $product->discount = $request->discount;
         $product->occasion_id = $request->occasion_id;
         $product->department_id = $request->department_id;
         $product->save();
         return response([
            'data'=> new ProductResource($product)
         ],201);*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }



}
