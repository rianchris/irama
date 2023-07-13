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
        $bu = Bu::all();
        $bu2 = Bu::where('myprofile_warga_id', null)->get();
        $data = [
            'klaster' => $klaster,
            'pengguna' => $pengguna,
            'mitra' => $mitra,
            'bu' => $bu,
            'bu2' => $bu2
        ];
        return view('set_pengguna.index', $data);
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        if ($request->input('role') == 'mitra') {
            $user = new User();
            $user->username = $request->input('username');
            $user->save();

            $myprofile = new Myprofile();
            $myprofile->user_id = $user->id;
            $myprofile->role = $request->input('role');
            $myprofile->phone = $request->input('phone');
            $myprofile->save();

            $bu = new Bu();
            $bu->myprofile_mitra_id = $user->id;
            $bu->klaster_id = $request->input('klaster_id');
            $bu->kode_klpbu_id = $request->input('kode_klpbu_id');
            $bu->save();
        } elseif ($request->input('role') == 'warga') {
            $user = new User();
            $user->username = $request->input('username');
            $user->save();

            $myprofile = new Myprofile();
            $myprofile->user_id = $user->id;
            $myprofile->role = $request->input('role');
            $myprofile->phone = $request->input('phone');
            $myprofile->save();

            $idBu = $request->input('bu_id');
            $bu = Bu::find($idBu);
            $bu->myprofile_warga_id = $user->id;
            $bu->save();
        }

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
        $bu = Bu::where('id', $request)->first();
        Myprofile::where('id', $bu->myprofile_mitra_id)->delete();
        Myprofile::where('id', $bu->myprofile_warga_id)->delete();

        User::where('id', $bu->myprofile_mitra_id)->delete();
        User::where('id', $bu->myprofile_warga_id)->delete();

        Bu::where('id', $request)->delete();

        // User::destroy($request);
        return redirect(route('setpengguna.index'))->with('deleted', 'User has been deleted!');
    }
}
