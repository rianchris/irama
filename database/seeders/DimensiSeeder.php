<?php

namespace Database\Seeders;

use App\Models\Dimensi;
use Illuminate\Database\Seeder;

class DimensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dimensi::create([
            'deskripsi' => 'Budaya dan Kapabilitas Risiko',
        ]);
        Dimensi::create([
            'deskripsi' => 'Organisasi dan Tata Kelola Risiko',
        ]);
        Dimensi::create([
            'deskripsi' => 'Kerangka Risiko dan Kepatuhan',
        ]);
        Dimensi::create([
            'deskripsi' => 'Proses dan Kontrol Risiko',
        ]);
        Dimensi::create([
            'deskripsi' => 'Model, Data dan Teknologi Risiko',
        ]);
    }
}
