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
        // dd($request);

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
                'du1' => $request->input('du1'),
                'du2' => $request->input('du2'),
                'du3' => $request->input('du3'),
                'du4' => $request->input('du4'),
                'du5' => $request->input('du5'),
                'du6' => $request->input('du6'),
                'du7' => $request->input('du7'),
                'du8' => $request->input('du8'),
                'du9' => $request->input('du9'),
                'du10' => $request->input('du10'),
                'du11' => $request->input('du11'),
                'du12' => $request->input('du12'),
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
            $buparam->du1 = $request->input('du1');
            $buparam->du2 = $request->input('du2');
            $buparam->du3 = $request->input('du3');
            $buparam->du4 = $request->input('du4');
            $buparam->du5 = $request->input('du5');
            $buparam->du6 = $request->input('du6');
            $buparam->du7 = $request->input('du7');
            $buparam->du8 = $request->input('du8');
            $buparam->du9 = $request->input('du9');
            $buparam->du10 = $request->input('du10');
            $buparam->du11 = $request->input('du11');
            $buparam->du12 = $request->input('du12');
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
