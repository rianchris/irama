<?php

namespace App\Http\Controllers;

use App\Models\MyProfile;
use App\Models\User;
use Illuminate\Http\Request;

class SetPenggunaController extends Controller
{
    public function index()
    {
        $data_pengguna = MyProfile::all();
        $data = [
            "pengguna" => $data_pengguna
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

        $myprofile = new MyProfile();
        $myprofile->user_id = $user->id;
        $myprofile->name = $request->input('name');
        $myprofile->email = $request->input('email');
        $myprofile->organization = $request->input('organization');
        $myprofile->phone = $request->input('phone');
        $myprofile->save();
        // Additional logic if needed
        return redirect()->route('setpengguna.index')->with('success', 'Data stored successfully.');
    }

    public function show(Myprofile $myprofile)
    {
        //
    }

    public function edit($myprofile)
    {

        $edit = MyProfile::where('id', $myprofile)->first();
        $editArray = $edit->toArray();
        // dd($editArray);
        return response()->json($editArray);
    }

    public function update(Request $request, Myprofile $myprofile)
    {
        //
    }

    public function destroy(MyProfile $pengguna)
    {
        MyProfile::destroy($pengguna);
        return redirect(route('setpengguna.index'))->with('deleted', 'User has been deleted!');
    }
}
