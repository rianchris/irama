<?php

namespace App\Http\Controllers;

use App\Models\Myprofile;
use App\Models\User;
use Illuminate\Http\Request;

class MyprofileController extends Controller
{

    public function index()
    {

        $user = User::first();
        // dd($user->myprofile->bu->param->first()->pivot->skorparam);
        return view('myprofile.index', $user);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }


    public function show(MyProfile $myprofile)
    {
        //
    }

    public function edit(MyProfile $myprofile)
    {
        //
    }

    public function update(Request $request, Myprofile $myprofile)
    {
        // dd($request);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'organization' => $request->organization,
            'phone' => $request->phoneNumber
        ];
        // dd($myprofile);
        Myprofile::where('id', $myprofile->id)->update($data);

        $findprofile = Myprofile::where('id', $myprofile->id)->first();
        $request->session()->put('pegawai', $findprofile);
        // dd($tes);
        return redirect(route('myprofile.index'))->with('success', 'Update data berhasil!');
        // dd($request);
    }


    public function destroy(MyProfile $myprofile)
    {
        //
    }
}
