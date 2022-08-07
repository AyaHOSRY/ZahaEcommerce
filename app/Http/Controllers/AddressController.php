<?php

namespace App\Http\Controllers;

use App\Models\address;
use App\Http\Requests\StoreaddressRequest;
use App\Http\Requests\UpdateaddressRequest;
use App\Http\Resources\AddressResource;
use App\Http\Resources\AddressCollection;
use App\Models\User;
class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        return AddressResource::collection($user->addresses);
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
     * @param  \App\Http\Requests\StoreaddressRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreaddressRequest $request, User $user)
    {
       // $address = Address::create($request->all());
        /*$address = new Address;
        $address->name = $request->street1;
        $address->save();*/
        $address= new Address;
        $address->street1 = $request->street1;
        $address->street2 = $request->street2;
        $address->city = $request->city;
        $address->state = $request->state;
        $address->country = $request->country;
        $address->zip_code = $request->zip_code;
        $address->user_id = auth('api')->user()->id;
        $address->save();
        return response([
            'data'=> new AddressResource($address)
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateaddressRequest  $request
     * @param  \App\Models\address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateaddressRequest $request, User $user,  $id)
    {
        $address= Address::find($id);
        $address->street1 = $request->street1;
        $address->street2 = $request->street2;
        $address->city = $request->city;
        $address->state = $request->state;
        $address->country = $request->country;
        $address->zip_code = $request->zip_code;
        $address->user_id = auth('api')->user()->id;
        $address->save();
           
       //$address->update($request->all());
        return response([
            'data'=> new AddressResource($address)
        ],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(address $address)
    {
        //
    }
}
