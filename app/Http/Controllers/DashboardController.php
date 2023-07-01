<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Klaster;
use App\Models\MyProfile;
use App\Models\Bu;
use App\Models\Sima_klpbu;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $klaster = Klaster::all();
        $bu = Bu::all();
        // dd($klaster->first()->bu);
        $data = [
            'klaster' => $klaster,
            'bu' => $bu
        ];
        return view('dashboard.index', $data);
    }
}
