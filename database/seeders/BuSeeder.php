<?php

namespace Database\Seeders;

use App\Models\Bu;
use Illuminate\Database\Seeder;

class BuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Bu::create([
        //     // 'kode_klpbu_id' => '731',
        //     // 'myprofile_id' => '1',
        //     // 'klaster_id' => '1',
        // ]);
        Bu::create([
            'kode_klpbu_id' => '732',
            'myprofile_mitra_id' => '2',
            'klaster_id' => '2',
        ]);
        Bu::create([
            'kode_klpbu_id' => '733',
            'myprofile_mitra_id' => '3',
            'klaster_id' => '3',
        ]);
        Bu::create([
            'kode_klpbu_id' => '734',
            'myprofile_mitra_id' => '4',
            'klaster_id' => '1',
        ]);
        Bu::create([
            'kode_klpbu_id' => '735',
            'myprofile_mitra_id' => '5',
            'klaster_id' => '1',
        ]);
    }
}
