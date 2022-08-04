<?php

namespace App\Http\Controllers;

use App\Models\detail;
use App\Http\Requests\StoredetailRequest;
use App\Http\Requests\UpdatedetailRequest;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(StoredetailRequest $request)
    {
        //
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
    public function update(UpdatedetailRequest $request, detail $detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(detail $detail)
    {
        //
    }
}
