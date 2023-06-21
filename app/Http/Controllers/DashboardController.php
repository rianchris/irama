<?php

namespace App\Http\Controllers;

use App\Models\MyProfile;
use App\Models\User;
use App\Models\Sima_klpbu;
use App\Models\BadanUsaha;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // $data = Sima_klpbu::get();
        // $data = BadanUsaha::get();
        // // $data = User::get();
        // $user = auth()->user();
        // $data = MyProfile::find($user);
        // dd($data[0]);
        // $pegawai = session('pegawai');
        // dd($pegawai);
        // dd($data);
        return view('dashboard.index');
    }
}
