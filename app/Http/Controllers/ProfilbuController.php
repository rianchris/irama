<?php

namespace App\Http\Controllers;

use App\Models\BadanUsaha;
use App\Models\Klaster;
use Illuminate\Http\Request;

class ProfilbuController extends Controller
{
    public function index()
    {
        $my_profile_id = auth()->user()->id;
        $badanusaha = BadanUsaha::where('id', $my_profile_id)->first();
        $data = [
            'badanusaha' => $badanusaha,
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

    public function show(BadanUsaha $profilbu)
    {
        //
    }

    public function edit(BadanUsaha $profilbu)
    {
        //
    }

    public function update(Request $request, BadanUsaha $profilbu)
    {
        $badanusaha =  BadanUsaha::find(1);
        // dd($badanusaha);
        $badanusaha->website = $request->input('website');
        $badanusaha->email = $request->input('email');
        $badanusaha->telepon = $request->input('telepon');
        $badanusaha->alamat = $request->input('alamat');
        $badanusaha->kodepos = $request->input('kodepos');
        $badanusaha->save();
        return redirect()->back()->with('success', 'Badan Usaha updated successfully');
    }

    public function destroy(BadanUsaha $profilbu)
    {
        //
    }
}
