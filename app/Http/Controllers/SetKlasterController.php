<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Klaster;

class SetKlasterController extends Controller
{
    public function index()
    {
        $klaster = Klaster::all();
        $data = [
            'klaster' => $klaster
        ];
        return view('set_klaster.index', $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $user = new Klaster();
        $user->nama_klaster = $request->input('klaster');
        $user->save();
        return redirect()->route('setklaster.index')->with('success', 'Data stored successfully.');
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
        //
    }

    public function destroy($id)
    {
        Klaster::destroy($id);
        return redirect()->route('setklaster.index')->with('deleted', 'Data deleted successfully.');
    }
}
