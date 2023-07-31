<?php

namespace Database\Seeders;

use App\Models\Budata;
use Illuminate\Database\Seeder;

class BudataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Budata::create([
            "tahun" => "2023",
            "bu_id" => 1,
            "data_id" => 1,
            "link" => "https://dan.bpkp.go.id",
        ]);
        Budata::create([
            "tahun" => "2023",
            "bu_id" => 1,
            "data_id" => 2,
            "link" => "https://dan.bpkp.go.id",
        ]);
        Budata::create([
            "tahun" => "2023",
            "bu_id" => 1,
            "data_id" => 3,
            "link" => "https://dan.bpkp.go.id",
        ]);
        Budata::create([
            "tahun" => "2023",
            "bu_id" => 1,
            "data_id" => 4,
            "link" => "https://dan.bpkp.go.id",
        ]);
        Budata::create([
            "tahun" => "2023",
            "bu_id" => 2,
            "data_id" => 1,
            "link" => "https://dan.bpkp.go.id",
        ]);
        Budata::create([
            "tahun" => "2023",
            "bu_id" => 2,
            "data_id" => 2,
            "link" => "https://dan.bpkp.go.id",
        ]);
        Budata::create([
            "tahun" => "2023",
            "bu_id" => 2,
            "data_id" => 12,
            "link" => "https://bpkp.go.id",
        ]);
        Budata::create([
            "tahun" => "2023",
            "bu_id" => 2,
            "data_id" => 5,
            "link" => "https://pusdiklatwas.bpkp.go.id",
        ]);
    }
}
