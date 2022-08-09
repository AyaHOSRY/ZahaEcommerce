<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\size;
use App\Http\Resources\SizeResource;
use App\Http\Resources\ProductResource;
use App\Http\Requests\ProductSizeRequest;

class ProuductSizeController extends Controller
{
    public function get_products_sizes(Product $product)
    {
        return SizeResource::collection($product->sizes);
    }

    public function store(ProductSizeRequest $request, $id)
    {
        $product = Product::find($id);
       
       $ProductSize =$product->sizes()->attach($request->size_id);
       return response([
        'status' => 'success'
    ],201);
    }


}
