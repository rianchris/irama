<?php

namespace App\Http\Controllers;

use App\Models\Bu;
use App\Models\Data;
use App\Models\Param;
use App\Models\Buparam;
use App\Models\Dimensi;
use App\Models\Myprofile;
use Illuminate\Http\Request;
use App\Models\Deskripsiskor;

class ParamController extends Controller
{
    public function index()
    {
        //session pegawai
        $pegawai = session('pegawai');
        $pengguna = Myprofile::where('id', $pegawai->id)->first();

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
        $buparam = Buparam::where('param_id', $request['param'])->where('bu_id', $pengguna->buMitra->id)->first();

        // dd($bu->where('id', 1)->get());

        $datas = Data::all();

        $data = [
            'bu' => $bu,
            'dimensi' => $dimensi,
            'param' => $param,
            'pengguna' => $pengguna,
            'buparam' => $buparam,
            'dataumum' => $datas
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

        if (null !== $request->input('skor')) {
            $buparamid = $request->input('bu_param_id');
        } else {
            return redirect()->back()->with('error', 'Skor wajib diisi!');
        }

        if ($buparamid == true) {
            $data = [
                'tahun' => date("Y"),
                'bu_id' => $request->input('bu_id'),
                'dimensi_id' => $request->input('dimensi_id'),
                'param_id' => $request->input('param_id'),
                'skor_mitra' => $request->input('skor'),
                'catatan' => $request->input('catatan'),
            ];

            Buparam::where('id', $buparamid)->where('tahun', date("Y"))->update($data);
        } elseif ($buparamid == null) {
            $buparam = new Buparam();
            $buparam->tahun = date("Y");
            // $buparam->id = $request->input('bu_param_id');
            $buparam->bu_id = $request->input('bu_id');
            $buparam->dimensi_id = $request->input('dimensi_id');
            $buparam->param_id = $request->input('param_id');
            $buparam->skor_mitra = $request->input('skor');
            $buparam->catatan = $request->input('catatan');
            $buparam->save();
        }
        return redirect()->back()->with('success', 'Simpan data berhasil!');
    }


    public function show($param)
    {
        //
    }


    public function edit(Param $param)
    {
        //
    }


    public function update(Request $request, Param $param)
    {
        //
    }

    public function destroy(Param $param)
    {
        //
    }
}
