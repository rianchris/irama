<?php

namespace Database\Seeders;

use App\Models\BadanUsaha;
use Illuminate\Database\Seeder;

class BadanUsahaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BadanUsaha::create([
            'kode_klpbu_id' => '731',
            'my_profile_id' => '1',
            'klaster_id' => '1',
        ]);
        BadanUsaha::create([
            'kode_klpbu_id' => '732',
            'my_profile_id' => '2',
            'klaster_id' => '2',
        ]);
        BadanUsaha::create([
            'kode_klpbu_id' => '733',
            'my_profile_id' => '3',
            'klaster_id' => '3',
        ]);
        BadanUsaha::create([
            'kode_klpbu_id' => '734',
            'my_profile_id' => '4',
            'klaster_id' => '3',
        ]);
        BadanUsaha::create([
            'kode_klpbu_id' => '735',
            'my_profile_id' => '5',
            'klaster_id' => '3',
        ]);
        BadanUsaha::create([
            'kode_klpbu_id' => '736',
            'my_profile_id' => '6',
            'klaster_id' => '3',
        ]);
        BadanUsaha::create([
            'kode_klpbu_id' => '737',
            'my_profile_id' => '7',
            'klaster_id' => '3',
        ]);
    }
}
