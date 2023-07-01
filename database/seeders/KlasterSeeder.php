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
            'nama_klaster' => 'Industri Energi, Minyak, dan Gas',
        ]);
        Klaster::create([
            'nama_klaster' => 'Industri Kesehatan',
        ]);
        Klaster::create([
            'nama_klaster' => 'Industri Manufaktur',
        ]);
        Klaster::create([
            'nama_klaster' => 'Industri Mineral dan Batubara',
        ]);
        Klaster::create([
            'nama_klaster' => 'Industri Pangan dan Pupuk',
        ]);
        Klaster::create([
            'nama_klaster' => 'Industri Perkebunan dan Kehutanan',
        ]);
        Klaster::create([
            'nama_klaster' => 'Jasa Asuransi dan Dana Pensiun',
        ]);
        Klaster::create([
            'nama_klaster' => 'Jasa Infrastruktur',
        ]);
        Klaster::create([
            'nama_klaster' => 'Jasa Keuangan',
        ]);
        Klaster::create([
            'nama_klaster' => 'Jasa Logistik',
        ]);
        Klaster::create([
            'nama_klaster' => 'Jasa Pariwisata dan Pendukung',
        ]);
        Klaster::create([
            'nama_klaster' => 'Jasa Telekomunikasi dan Media',
        ]);
    }
}
