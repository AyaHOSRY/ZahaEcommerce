<?php

namespace App\Http\Controllers;

use App\Models\occasion;
use App\Http\Requests\StoreoccasionRequest;
use App\Http\Requests\UpdateoccasionRequest;
use App\Http\Resources\OccasionResource;

class OccasionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return OccasionResource::collection(Occasion::all());
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
     * @param  \App\Http\Requests\StoreoccasionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreoccasionRequest $request)
    {
        $occasion = new Occasion;
        $occasion->name = $request->name;
        $occasion->save();

        return response([
            'data' => new OccasionResource($occasion)
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\occasion  $occasion
     * @return \Illuminate\Http\Response
     */
    public function show(occasion $occasion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\occasion  $occasion
     * @return \Illuminate\Http\Response
     */
    public function edit(occasion $occasion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateoccasionRequest  $request
     * @param  \App\Models\occasion  $occasion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateoccasionRequest $request, occasion $occasion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\occasion  $occasion
     * @return \Illuminate\Http\Response
     */
    public function destroy(occasion $occasion)
    {
        $occasion->delete();
        return response(null,404);
    }
}
