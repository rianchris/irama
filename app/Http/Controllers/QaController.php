<?php

namespace App\Http\Controllers;

use App\Models\Bu;

use App\Models\Data;
use App\Models\Param;
use App\Models\Buparam;
use App\Models\Dimensi;
use App\Models\Myprofile;
use Illuminate\Http\Request;

class QaController extends Controller
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
        $bu = Bu::where('myprofile_warga_id', $pengguna->id)->get();
        // $dimensi = $bu->param->where('dimensi_id', $request['dimensi']);

        //data tabel dimensi
        $dimensi = Dimensi::where('id', $request['dimensi'])->first();

        //data param
        $param = Param::where('dimensi_id', $request['dimensi'])->get();
        // $param = Param::first();

        // data bu param
        $buparam = Buparam::where('param_id', $request['param'])->where('bu_id', $pengguna->buWarga->id)->first();

        // dd($buparam);
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
        //
    }

    public function show($id)
    {
        // 
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        // dd($request);
        // dd($request);
        $buparam = Buparam::findOrFail($id);
        $validatedData = $request->validate([
            'hasilreviu' => '',
            'skor_warga' => 'required'
        ]);

        // Update the resource with the validated data
        $buparam->update($validatedData);

        return redirect()->back()->with('success', 'Simpan data berhasil!');
    }

    public function destroy($id)
    {
        //
    }
}
