<?php

namespace Database\Seeders;

use App\Models\Param;
use App\Models\BuParam;
use App\Models\BadanUsaha;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class BuParamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Buparam::create([
            'tahun' => '2023',
            'bu_id' => 1,
            'param_id' => 1,
            'skor_mitra' => 2
        ]);
    }
}
