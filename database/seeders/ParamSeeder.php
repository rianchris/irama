<?php

namespace Database\Seeders;

use App\Models\Param;
use Illuminate\Database\Seeder;

class ParamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = param();
        foreach ($param as $params) {
            Param::create([
                'id' => $params['id'],
                'dimensi_id' => $params['dimensi_id'],
                'tujuan' => $params['tujuan'],
                'deskripsi' => $params['deskripsi'],
                'ref' => $params['ref'],
                'pertanyaan' => $params['pertanyaan'],
            ]);
        }
    }
}
