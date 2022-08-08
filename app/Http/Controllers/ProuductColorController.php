<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\color;
use App\Http\Resources\ColorResource;
use App\Http\Resources\ProductColorResource;
use App\Http\Requests\ProductColorRequest;

class ProuductColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        return ColorResource::collection($product->colors);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductColorRequest $request, Product $product)
    {
        //$id = Product::find($id);
       /* $product = Product::find($id);
        $product->colors()->attach([
            'color_id'=> $request->color_id,
            'image'=> $request->image,
        ]);
       $product->colors()->attach([
            'product_id'=> $product->id,
            'color_id'=> $request->color_id,
            'image'=> $request->image,
        ]);*/
        $ProductColor = $product->colors()->sync([
           // 'product_id'=> $product->id,
            'color_id'=> $request->color_id,
            //'image'=> $request->image,
        ]);
        //$product->colors()->sync($request->colors, false);
        return response([
            'data' => new ProductColorResource($ProductColor)
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
