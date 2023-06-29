<?php

namespace App\Http\Controllers;

use App\Models\Param;
use App\Models\Dimensi;

use Illuminate\Http\Request;
use App\Models\Deskripsiskor;

class SetParamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $param = Param::all();

        $data = [
            'param' => $param,
        ];
        return view('set_param.index', $data);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $param = Param::where('id', $id)->first();
        $dimensi = Dimensi::all();
        $deskripsiskor = Deskripsiskor::where('param_id', $id)->first();
        $data = [
            'param' => $param,
            'deskripsiskor' => $deskripsiskor,
            'dimensi' => $dimensi
        ];
        return view('set_param.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($id);
        $dataParam = [
            'dimensi_id' => $request->dimensi,
            'tujuan' => $request->tujuan,
            'deskripsi' => $request->deskripsi,
            'ref' => $request->ref,
            'pertanyaan' => $request->pertanyaan
        ];
        Param::where('id', $id)->update($dataParam);
        $dataDeskripsiskor = [
            'skor0' => $request->skor0,
            'skor1' => $request->skor1,
            'skor2' => $request->skor2,
            'skor3' => $request->skor3,
            'skor4' => $request->skor4,
            'skor5' => $request->skor5,
        ];
        Deskripsiskor::where('param_id', $id)->update($dataDeskripsiskor);

        return redirect()->back()->with('success', 'Update data berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
