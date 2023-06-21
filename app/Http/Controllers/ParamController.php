<?php

namespace App\Http\Controllers;

use App\Models\Param;
use App\Models\Dimensi;
use App\Models\BadanUsaha;
use Illuminate\Http\Request;
use App\Models\Deskripsiskor;
use App\Models\MyProfile;

class ParamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = session('pegawai');
        $badanusaha = BadanUsaha::where('my_profile_id', $pegawai->id)->first();
        dd($badanusaha->param[0]->pivot);

        // $param = Param::first();
        // $deskripsiskor = Deskripsiskor::find(25);
        // $request = request('dimensi');
        // $dimensi = Dimensi::where('id', $request)->first();
        // $data = [
        //     'dimensi' => $dimensi,
        // ];
        // return view('mitra.parameter.index', $data);
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
    public function store(Request $request)
    {
        dd($request);
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
    public function update(Request $request, Param $param)
    {
        dd($request);
        return "test";
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
