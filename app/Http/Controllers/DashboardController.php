<?php

namespace App\Http\Controllers;

use App\Models\Bu;
use App\Models\Param;
use App\Models\Buparam;
use App\Models\Dimensi;
use App\Models\Klaster;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $klaster = Klaster::all();
        $bu = Bu::all();
        $dimensi = Dimensi::all();


        $skorAkhirMitra = '';
        $skorAkhirWarga = '';
        if (auth()->user()->myprofile->role == 'mitra') {
            $buMitra = auth()->user()->myprofile->buMitra;
            $skorAkhirMitra = DB::table('bu_params')->where('skor_mitra', '<>', 0)->where('bu_id', $buMitra->id)->avg('skor_mitra');
        } elseif (auth()->user()->myprofile->role == 'warga') {
            $buWarga = auth()->user()->myprofile->buWarga;
            $skorAkhirWarga = DB::table('bu_params')->where('skor_warga', '<>', 0)->where('bu_id', $buWarga->id)->avg('skor_warga');
        } else {
        }

        // dd($skor_akhir);

        // dd($klaster->first()->bu->first()->sima_klpbu);
        $data = [
            'klaster' => $klaster,
            'bu' => $bu,
            'dimensi' => $dimensi,
            'skorAkhirMitra' => $skorAkhirMitra,
            'skorAkhirWarga' => $skorAkhirWarga
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
                $param = Param::where('id', $buparams->param_id)->first();
                $dimensi = Dimensi::where('id', $param->dimensi_id)->first();
                $html .= "
                <tr>
                <td>$buparams->param_id</td>
                <td>$param->deskripsi</td>
                <td>$dimensi->deskripsi</td>
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
