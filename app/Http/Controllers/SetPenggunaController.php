<?php

namespace App\Http\Controllers;

use App\Models\Myprofile;
use App\Models\User;
use App\Models\Sima_klpbu;
use App\Models\Bu;
use App\Models\Klaster;
use Illuminate\Http\Request;

class SetPenggunaController extends Controller
{
    public function index()
    {
        $klaster = Klaster::all();
        $mitra = Myprofile::where('role', 'mitra')->count();
        $pengguna = Myprofile::get();
        $data = [
            'klaster' => $klaster,
            'pengguna' => $pengguna,
            'mitra' => $mitra
        ];
        return view('set_pengguna.index', $data);
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->username = $request->input('username');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        $myprofile = new Myprofile();
        $myprofile->user_id = $user->id;
        $myprofile->name = $request->input('name');
        $myprofile->email = $request->input('email');
        $myprofile->phone = $request->input('phone');
        $myprofile->save();

        $bu = new Bu();
        $bu->myprofile_id = $user->id;
        $bu->kode_klpbu_id = $request->input('kode_klpbu_id');
        $bu->klaster_id = $request->input('klaster_id');
        $bu->save();

        // Additional logic if needed
        return redirect()->route('setpengguna.index')->with('success', 'Data stored successfully.');
    }

    public function show(Myprofile $myprofile)
    {
        //
    }

    public function edit($myprofile)
    {
    }

    public function update(Request $request, Myprofile $myprofile)
    {
        //
    }

    public function destroy($request)
    {
        Myprofile::destroy($request);
        User::destroy($request);
        return redirect(route('setpengguna.index'))->with('deleted', 'User has been deleted!');
    }
}
