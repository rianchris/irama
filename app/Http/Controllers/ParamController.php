<?php

namespace App\Http\Controllers;

use App\Models\Param;
use App\Models\Dimensi;
use App\Models\Bu;
use App\Models\BuParam;
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


        //session pegawai
        $pegawai = session('pegawai');
        $pengguna = MyProfile::where('id', $pegawai->id)->first();

        //request url
        $request_dimensi = request('dimensi');
        $request_param = request('param');
        $request = [
            'dimensi' => $request_dimensi,
            'param' => $request_param
        ];

        //data tabel dimensi dan bu
        $bu = Bu::where('myprofile_mitra_id', $pengguna->id)->get();
        // $dimensi = $bu->param->where('dimensi_id', $request['dimensi']);

        //data tabel dimensi
        $dimensi = Dimensi::where('id', $request['dimensi'])->first();

        //data param
        $param = Param::where('dimensi_id', $request['dimensi'])->get();
        // $param = Param::first();

        // data bu param
        $buparam = BuParam::where('param_id', $request['param'])->where('bu_id', $pengguna->buMitra->id)->first();

        // dd($bu->where('id', 1)->get());

        $data = [
            'bu' => $bu,
            'dimensi' => $dimensi,
            'param' => $param,
            'pengguna' => $pengguna,
            'buparam' => $buparam
        ];



        if (request('dimensi')) {
            if (request('param')) {
                // dd($data['param']);
                return view('mitra.parameter.index', $data);
            }
            // dd($data);
            return view('mitra.parameter.landing', $data);
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        $buparamid = $request->input('bu_param_id');
        // dd($buparamid);
        if ($buparamid == true) {
            $data = [
                'tahun' => date("Y"),
                'bu_id' => $request->input('bu_id'),
                'param_id' => $request->input('param_id'),
                'skor_mitra' => $request->input('skor'),
                'filepdf' => $request->input('filepdf'),
                'filexlsx' => $request->input('filexlsx'),
                'filedocx' => $request->input('filedocx'),
            ];
            BuParam::where('id', $buparamid)->where('tahun', date("Y"))->update($data);
        } elseif ($buparamid == null) {
            $buparam = new BuParam();
            $buparam->tahun = date("Y");
            // $buparam->id = $request->input('bu_param_id');
            $buparam->bu_id = $request->input('bu_id');
            $buparam->param_id = $request->input('param_id');
            $buparam->skor_mitra = $request->input('skor');
            $buparam->filepdf = $request->input('filepdf');
            $buparam->filexlsx = $request->input('filexlsx');
            $buparam->filedocx = $request->input('filedocx');
            $buparam->save();
        }
        return redirect()->back()->with('success', 'Simpan data berhasil!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Param  $param
     * @return \Illuminate\Http\Response
     */
    public function show($param)
    {
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
