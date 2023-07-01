<?php

namespace App\Http\Controllers;

use App\Models\Bu;

use App\Models\BuParam;
use App\Models\Dimensi;
use Illuminate\Http\Request;

class QaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dimensi = Dimensi::all();
        $bu = Bu::all();
        $data = [
            'bu' => $bu,
            'dimensi' => $dimensi
        ];
        return view("qa.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bu_details = Bu::with('param', 'sima_klpbu')->findOrFail($id);
        $skorparam = collect();
        if ($bu_details) {
            foreach ($bu_details->param as $param) {
                $skorparam->push($param->pivot->skorparam);
            }
        } else {
            return '';
        }
        $data = [
            'bu_details' => $bu_details,
            'body' => $skorparam
        ];
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $buParam = BuParam::where('bu_id', $id)->get();
        $data = [
            'buParam' => $buParam
        ];
        return view('qa.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
