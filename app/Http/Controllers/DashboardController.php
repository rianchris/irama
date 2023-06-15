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
        $data = User::get();
        // $data = MyProfile::get();
        dd($data);
        return view('dashboard.index');
    }
}
