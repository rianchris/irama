<?php

namespace App\Http\Controllers;

use App\Models\Param;
use App\Http\Requests\StoreParamRequest;
use App\Http\Requests\UpdateParamRequest;

class ParamController extends Controller
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
     * @param  \App\Http\Requests\StoreParamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreParamRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Param  $param
     * @return \Illuminate\Http\Response
     */
    public function show(Param $param)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Param  $param
     * @return \Illuminate\Http\Response
     */
    public function edit(Param $param)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateParamRequest  $request
     * @param  \App\Models\Param  $param
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateParamRequest $request, Param $param)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Param  $param
     * @return \Illuminate\Http\Response
     */
    public function destroy(Param $param)
    {
        //
    }
}
