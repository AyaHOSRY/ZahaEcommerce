<?php

namespace App\Http\Controllers;

use App\Models\department;
use App\Http\Requests\StoredepartmentRequest;
use App\Http\Requests\UpdatedepartmentRequest;
use App\Http\Resources\DepartmentResource;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // return Department::all();
        return DepartmentResource::collection(Department::all());

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
     * @param  \App\Http\Requests\StoredepartmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoredepartmentRequest $request)
    {
        $department = new Department;
        $department->id = $request->id;
        $department->name = $request->name;
        $department->parent_id = $request->parent_id;
        $department->save();
        return response([
            'data'=> new DepartmentResource($department)
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(department $department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatedepartmentRequest  $request
     * @param  \App\Models\department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatedepartmentRequest $request, $id)
    {
        $department = Department::find($id);
       // $department->update($request->all());
       $department->name = $request->name;
       $department->parent_id = $request->parent_id;
        $department->save();
        return response([
            'data'=> new DepartmentResource($department)
         ],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(department $department)
    {
        //
    }
}
