<?php

namespace App\Http\Controllers;

use App\Models\Bu;
use App\Models\Data;
use App\Models\Budata;
use Illuminate\Http\Request;

class DataUmumController extends Controller
{

    public function index()
    {
        $datas = Data::all();
        $bu = Bu::all();
        // $pengguna = session('pegawai');
        $myprofile = auth()->user()->myprofile;
        // dd($myprofile);
        if ($myprofile->role == "mitra") {
            $bu = $myprofile->buMitra;
        } elseif ($myprofile->role == "warga") {
            $bu = $myprofile->buWarga;
        }
        $budatas = Budata::where('bu_id', $bu->id)->orderBy('data_id')->get();
        // dd($budatas);

        $data = [
            "myprofile" => $myprofile,
            "budatas" => $budatas,
            "datas" => $datas,
            "bu" => $bu
        ];
        return view('mitra.data-umum.index', $data);
    }


    public function create()
    {
    }


    public function store(Request $request)
    {

        // dd($request);
        $budata = new Budata();
        $budata->tahun = date("Y");
        // $budata->id = $request->input('bu_param_id');
        $budata->bu_id = $request->input('bu_id');
        $budata->data_id = $request->input('data_id');
        $budata->link = $request->input('link');
        $budata->catatan = $request->input('catatan');
        $budata->save();

        return redirect()->back()->with('success', 'Simpan data berhasil!');
    }


    public function update(Request $request, $id)
    {
        // dd($id);
        $data = [
            'tahun' => date("Y"),
            'bu_id' => $request->input('bu_id'),
            'data_id' => $request->input('data_id'),
            'link' => $request->input('link'),
            'catatan' => $request->input('catatan'),
        ];

        Budata::where('id', $id)->where('tahun', date("Y"))->update($data);
        $update = 'update' . $data['data_id'];
        // dd($update);
        return redirect()->back()->with($update, 'Update data berhasil!');
    }


    public function destroy($id)
    {
        //
    }
}
