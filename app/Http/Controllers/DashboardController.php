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
        $auth = auth()->user()->myprofile->role;
        $klaster = Klaster::all();
        $bu = Bu::all();
        $dimensi = Dimensi::all();
        $skorAkhirMitra = '';
        $skorAkhirWarga = '';

        // $data = [
        if ($auth == 'mitra') {
            $buMitra = auth()->user()->myprofile->buMitra;
            $skorAkhirMitra = DB::table('bu_params')->where('skor_mitra', '<>', 0)->where('bu_id', $buMitra->id)->avg('skor_mitra');

            $skorAvgSaDimensi = [];
            for ($dimensi_id = 1; $dimensi_id <= 5; $dimensi_id++) {
                $skorAvg = DB::table('bu_params')->where('skor_mitra', '<>', 0)->where('bu_id', $buMitra->id)->where('dimensi_id', $dimensi_id)->avg('skor_mitra');
                $skorAvgSaDimensi[$dimensi_id] = $skorAvg;
            }
            $skorAvgQaDimensi = [];
            for ($dimensi_id = 1; $dimensi_id <= 5; $dimensi_id++) {
                $skorAvg = DB::table('bu_params')->where('skor_warga', '<>', 0)->where('bu_id', $buMitra->id)->where('dimensi_id', $dimensi_id)->avg('skor_warga');
                $skorAvgQaDimensi[$dimensi_id] = $skorAvg;
            }
            $data = [
                'klaster' => $klaster,
                'bu' => $bu,
                'dimensi' => $dimensi,
                'skorAkhirMitra' => $skorAkhirMitra,
                'skord1sa' => $skorAvgSaDimensi[1],
                'skord2sa' => $skorAvgSaDimensi[2],
                'skord3sa' => $skorAvgSaDimensi[3],
                'skord4sa' => $skorAvgSaDimensi[4],
                'skord5sa' => $skorAvgSaDimensi[5],
                'skord1qa' => $skorAvgQaDimensi[1],
                'skord2qa' => $skorAvgQaDimensi[2],
                'skord3qa' => $skorAvgQaDimensi[3],
                'skord4qa' => $skorAvgQaDimensi[4],
                'skord5qa' => $skorAvgQaDimensi[5],
            ];
            return view('dashboard.mitra.index', $data);
        } elseif ($auth == 'warga') {
            $buWarga = auth()->user()->myprofile->buWarga;
            $skorAkhirWarga = DB::table('bu_params')->where('skor_warga', '<>', 0)->where('bu_id', $buWarga->id)->avg('skor_warga');
            $skorAvgSaDimensi = [];
            for ($dimensi_id = 1; $dimensi_id <= 5; $dimensi_id++) {
                $skorAvg = DB::table('bu_params')->where('skor_mitra', '<>', 0)->where('bu_id', $buWarga->id)->where('dimensi_id', $dimensi_id)->avg('skor_mitra');
                $skorAvgSaDimensi[$dimensi_id] = $skorAvg;
            }
            $skorAvgQaDimensi = [];
            for ($dimensi_id = 1; $dimensi_id <= 5; $dimensi_id++) {
                $skorAvg = DB::table('bu_params')->where('skor_warga', '<>', 0)->where('bu_id', $buWarga->id)->where('dimensi_id', $dimensi_id)->avg('skor_warga');
                $skorAvgQaDimensi[$dimensi_id] = $skorAvg;
            }
            $data = [
                'klaster' => $klaster,
                'bu' => $bu,
                'dimensi' => $dimensi,
                'skorAkhirWarga' => $skorAkhirWarga,
                'skord1sa' => $skorAvgSaDimensi[1],
                'skord2sa' => $skorAvgSaDimensi[2],
                'skord3sa' => $skorAvgSaDimensi[3],
                'skord4sa' => $skorAvgSaDimensi[4],
                'skord5sa' => $skorAvgSaDimensi[5],
                'skord1qa' => $skorAvgQaDimensi[1],
                'skord2qa' => $skorAvgQaDimensi[2],
                'skord3qa' => $skorAvgQaDimensi[3],
                'skord4qa' => $skorAvgQaDimensi[4],
                'skord5qa' => $skorAvgQaDimensi[5],
            ];
            return view('dashboard.warga.index', $data);
        } elseif ($auth == 'admin') {
            $data = [
                'klaster' => $klaster,
                'bu' => $bu,
                'dimensi' => $dimensi,
            ];
            return view('dashboard.admin.index', $data);
        }
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
