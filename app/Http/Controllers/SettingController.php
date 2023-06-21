<?php

namespace App\Http\Controllers;

use App\Models\Sima_klpbu;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function sima_klpbu()
    {
        $sima_klpbu = Sima_klpbu::get();
        $data = ['sima_klpbu' => $sima_klpbu];

        return view('setting/sima_klpbu', $data);
    }
}
