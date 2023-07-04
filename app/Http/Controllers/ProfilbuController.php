<?php

namespace App\Http\Controllers;

use App\Models\Bu;
use App\Models\Klaster;
use Illuminate\Http\Request;

class ProfilbuController extends Controller
{
    public function index()
    {
        $myprofileMitra_id = auth()->user()->id;
        $bu = Bu::where('myprofile_mitra_id', $myprofileMitra_id)->first();
        $data = [
            'bu' => $bu,
        ];
        return view('mitra.profilebu.index', $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Bu $profilbu)
    {
        //
    }

    public function edit(Bu $profilbu)
    {
        //
    }

    public function update(Request $request, Bu $profilbu)
    {
        $bu =  Bu::find(1);
        // dd($bu);
        $bu->website = $request->input('website');
        $bu->email = $request->input('email');
        $bu->telepon = $request->input('telepon');
        $bu->alamat = $request->input('alamat');
        $bu->kodepos = $request->input('kodepos');
        $bu->skorsebelumnya = $request->input('skorsebelumnya');
        $bu->save();
        return redirect()->back()->with('success', 'Profil Badan Usaha berhasil disimpan!');
    }

    public function destroy(Bu $profilbu)
    {
        //
    }
}
