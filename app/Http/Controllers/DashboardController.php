<?php

namespace App\Http\Controllers;

use App\Models\Bu;
use App\Models\Buparam;
use App\Models\Dimensi;
use App\Models\Klaster;

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

    public function redirect()
    {
        return redirect(route('dashboard.index'));
    }

    public function progress()
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
        return view('dashboard.admin.progres', $data);
    }

    public function rincian()
    {
        $bu = Bu::all();
        $data = [
            'bu' => $bu
        ];
        return view('dashboard.admin.rincian', $data);
    }

    public function show($id)
    {
        $buparam = Buparam::where('bu_id', $id)->get();
        $html = "";
        if (!empty($buparam)) {
            foreach ($buparam as $buparams) {
                $html .= "
                <tr>
                <td>$buparams->param_id</td>
                <td>$buparams->skor_mitra</td>
                <td>$buparams->skor_warga</td>
                </tr>
                ";
            }
        }
        // dd($html);

        $response['html'] = $html;
        return response()->json($response);
    }
}
