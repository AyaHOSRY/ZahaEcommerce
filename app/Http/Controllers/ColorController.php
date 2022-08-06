<?php

namespace App\Http\Controllers;

use App\Models\color;
use App\Http\Requests\StorecolorRequest;
use App\Http\Requests\UpdatecolorRequest;
use App\Http\Resources\ColorResource;
class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ColorResource::collection(Color::all());
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
     * @param  \App\Http\Requests\StorecolorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorecolorRequest $request)
    {
        $color = new Color;
        $color->name = $request->name;
        $color->save();
        return response([
            'data'=> new ColorResource($color)
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\color  $color
     * @return \Illuminate\Http\Response
     */
    public function show(color $color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\color  $color
     * @return \Illuminate\Http\Response
     */
    public function edit(color $color)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecolorRequest  $request
     * @param  \App\Models\color  $color
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatecolorRequest $request, color $color)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\color  $color
     * @return \Illuminate\Http\Response
     */
    public function destroy(color $color)
    {
        //
    }
}
