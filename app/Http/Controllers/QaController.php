<?php

namespace App\Http\Controllers;

use App\Models\Bu;

use App\Models\Param;
use App\Models\BuParam;
use App\Models\Dimensi;
use App\Models\Myprofile;
use Illuminate\Http\Request;

class QaController extends Controller
{

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
        $bu = Bu::where('myprofile_warga_id', $pengguna->id)->get();
        // $dimensi = $bu->param->where('dimensi_id', $request['dimensi']);

        //data tabel dimensi
        $dimensi = Dimensi::where('id', $request['dimensi'])->first();

        //data param
        $param = Param::where('dimensi_id', $request['dimensi'])->get();
        // $param = Param::first();

        // data bu param
        $buparam = BuParam::where('param_id', $request['param'])->where('bu_id', $pengguna->buWarga->id)->first();

        // dd($buparam);

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
        //
    }

    public function show($id)
    {
        $bu_details = Bu::with('param', 'sima_klpbu')->findOrFail($id);
        $skorparam = collect();
        if ($bu_details) {
            foreach ($bu_details->param as $param) {
                $skorparam->push($param->pivot->skorparam);
            }
        } else {
            return '';
        }
        $data = [
            'bu_details' => $bu_details,
            'body' => $skorparam
        ];
        return response()->json($data);
    }

    public function edit($id)
    {
        $buParam = BuParam::where('bu_id', $id)->get();
        $bu = Bu::where('id', $id)->first();
        $param = Param::get();
        $data = [
            'buParam' => $buParam,
            'bu' => $bu,
            'param' => $param
        ];
        return view('qa.edit', $data);
    }

    public function update(Request $request, $id)
    {
        // dd($request);
        // dd($request);
        $buparam = BuParam::findOrFail($id);
        $validatedData = $request->validate([
            'hasilreviu' => '',
            'skor_warga' => 'required'
        ]);

        // Update the resource with the validated data
        $buparam->update($validatedData);

        // // dd($id);
        // $buparam = new BuParam();
        // $buparam->id = $request->id;
        // $buparam->bu_id = $request->input('bu_id');
        // $buparam->param_id = $request->input('param_id');
        // $buparam->tahun = date("Y");
        // $buparam->hasilreviu = $request->input('hasilreviu');
        // $buparam->skor_warga = $request->input('skorwarga');
        // $buparam->save();

        return redirect()->back()->with('success', 'Simpan data berhasil!');
    }

    public function destroy($id)
    {
        //
    }
}
