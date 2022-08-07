<?php

namespace App\Http\Controllers;

use App\Models\size;
use App\Http\Requests\StoresizeRequest;
use App\Http\Requests\UpdatesizeRequest;
use App\Http\Resources\SizeResource;
class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SizeResource::collection(Size::all());
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
     * @param  \App\Http\Requests\StoresizeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoresizeRequest $request)
    {
        $size = new Size;
        $size->name = $request->name;
        $size->save();
        return response([
            'data'=> new SizeResource($size)
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\size  $size
     * @return \Illuminate\Http\Response
     */
    public function show(size $size)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\size  $size
     * @return \Illuminate\Http\Response
     */
    public function edit(size $size)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatesizeRequest  $request
     * @param  \App\Models\size  $size
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatesizeRequest $request, size $size)
    {
        $size->name = $request->name;
        $size->save();
        return response([
            'data'=> new SizeResource($size)
        ],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\size  $size
     * @return \Illuminate\Http\Response
     */
    public function destroy(size $size)
    {
        $size->delete();
        return response(null,204);
    }
}
