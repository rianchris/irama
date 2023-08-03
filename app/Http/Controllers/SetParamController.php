<?php

namespace App\Http\Controllers;

use App\Models\Param;
use App\Models\Dimensi;
use Illuminate\Http\Request;
use App\Models\Deskripsiskor;

class SetParamController extends Controller
{
    public function index()
    {
        $param = Param::all();

        $data = [
            'param' => $param,
        ];
        return view('set_param.index', $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

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

    public function update(Request $request, $id)
    {
        // dd($request);
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

    public function destroy($id)
    {
        //
    }
}
