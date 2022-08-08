<?php

namespace App\Http\Controllers;

use App\Models\detail;
use App\Models\department;
use App\Http\Requests\StoredetailRequest;
use App\Http\Requests\UpdatedetailRequest;
use App\Http\Resources\DetailResource;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(department $department)
    {
        return DetailResource::collection($department->details);
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
     * @param  \App\Http\Requests\StoredetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoredetailRequest $request,Department $department)
    {
        $detail = new Detail ($request->all());
        $department->details()->save($detail);
        return response([
            'data'=> new DetailResource($detail)
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function show(detail $detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function edit(detail $detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatedetailRequest  $request
     * @param  \App\Models\detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatedetailRequest $request, Department $department ,detail  $detail)
    {
        $detail->id = $request->id;
        $detail->key = $request->key;
        $detail->department_id = $department->id;
        $detail->save();
       //$detail->update($request->validated());
        return response([
            'data'=> new DetailResource($detail)
         ],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department, detail $detail)
    {
        $detail->delete();
        return response(null,404);
    }
}
