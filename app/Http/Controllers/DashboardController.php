<?php

namespace App\Http\Controllers;

use App\Models\MyProfile;
use App\Models\User;
use App\Models\Sima_klpbu;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // $data = Sima_klpbu::get();
        // // $data = User::get();
        // $user = auth()->user();
        // $data = MyProfile::find($user);
        // dd($data[0]);
        // $pegawai = session('pegawai');
        // dd($pegawai);
        return view('dashboard.index');
    }
}
