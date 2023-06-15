<?php

namespace Database\Seeders;

use App\Models\Klaster;
use Illuminate\Database\Seeder;

class KlasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Klaster::create([
            'nama_klaster' => 'Keuangan',
        ]);
        Klaster::create([
            'nama_klaster' => 'Manufaktur',
        ]);
        Klaster::create([
            'nama_klaster' => 'Perkebunan',
        ]);
    }
}
