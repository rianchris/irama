<?php

namespace App\Http\Controllers;

use App\Models\Profilbu;
use App\Models\Klaster;
use Illuminate\Http\Request;

class ProfilbuController extends Controller
{
    public function index()
    {
        $klaster = Klaster::all();
        $data = [
            'klaster' => $klaster,
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

    public function show(Profilbu $profilbu)
    {
        //
    }

    public function edit(Profilbu $profilbu)
    {
        //
    }

    public function update(Request $request, Profilbu $profilbu)
    {
        //
    }

    public function destroy(Profilbu $profilbu)
    {
        //
    }
}
