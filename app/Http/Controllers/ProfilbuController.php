<?php

namespace App\Http\Controllers;

use App\Models\Bu;
use App\Models\Klaster;
use Illuminate\Http\Request;

class ProfilbuController extends Controller
{
    public function index()
    {
        $my_profile_id = auth()->user()->id;
        $bu = Bu::where('id', $my_profile_id)->first();
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
        $bu->save();
        return redirect()->back()->with('success', 'Badan Usaha updated successfully');
    }

    public function destroy(Bu $profilbu)
    {
        //
    }
}
