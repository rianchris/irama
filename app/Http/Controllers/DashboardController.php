<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Klaster;
use App\Models\MyProfile;
use App\Models\Bu;
use App\Models\Dimensi;
use App\Models\Sima_klpbu;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $klaster = Klaster::all();
        $bu = Bu::all();
        $dimensi = Dimensi::all();
        // dd($klaster->first()->bu->first()->sima_klpbu);
        $data = [
            'klaster' => $klaster,
            'bu' => $bu,
            'dimensi' => $dimensi
        ];
        return view('dashboard.index', $data);
    }
}
