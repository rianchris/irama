<?php

namespace Database\Seeders;

use App\Models\Data;
use Illuminate\Database\Seeder;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Data::create([
            // "tahun" => "2023",
            // "bu_id" => "1",
            "deskripsi" => "AD/ART PERUSAHAAN",
            // "link" => "https://dan.bpkp.go.id",
            "category" => "umum",
        ]);
        Data::create([
            // "tahun" => "2023",
            // "bu_id" => "1",
            "deskripsi" => "ANNUAL REPORT PERUSAHAAN",
            // "link" => "https://dan.bpkp.go.id",
            "category" => "umum",
        ]);
        Data::create([
            // "tahun" => "2023",
            // "bu_id" => "1",
            "deskripsi" => "RISK PROFILE PERUSAHAAN",
            // "link" => "https://dan.bpkp.go.id",
            "category" => "umum",
        ]);
        Data::create([
            // "tahun" => "2023",
            // "bu_id" => "1",
            "deskripsi" => "PEDOMAN MANAJEMEN RISIKO",
            // "link" => "https://dan.bpkp.go.id",
            "category" => "umum",
        ]);
        Data::create([
            // "tahun" => "2023",
            // "bu_id" => "1",
            "deskripsi" => "LAPORAN PELAKSANAAN MANAJEMEN RISIKO",
            // "link" => "https://dan.bpkp.go.id",
            "category" => "umum",
        ]);
        Data::create([
            // "tahun" => "2023",
            // "bu_id" => "1",
            "deskripsi" => "LOST EVENT DATABASE",
            // "link" => "https://dan.bpkp.go.id",
            "category" => "umum",
        ]);
        Data::create([
            // "tahun" => "2023",
            // "bu_id" => "1",
            "deskripsi" => "KERTAS KERJA PROSES MANAJEMEN RISIKO",
            // "link" => "https://dan.bpkp.go.id",
            "category" => "umum",
        ]);
        Data::create([
            // "tahun" => "2023",
            // "bu_id" => "1",
            "deskripsi" => "LAPORAN MONITORING KEGIATAN MANAJEMEN RISIKO",
            // "link" => "https://dan.bpkp.go.id",
            "category" => "umum",
        ]);
        Data::create([
            // "tahun" => "2023",
            // "bu_id" => "1",
            "deskripsi" => "CATATAN AKUNTANSI DAN KEUANGAN",
            // "link" => "https://dan.bpkp.go.id",
            "category" => "umum",
        ]);
        Data::create([
            // "tahun" => "2023",
            // "bu_id" => "1",
            "deskripsi" => "LAPORAN HASIL AUDIT SPI DAN TINDAK LANJUTNYA",
            // "link" => "https://dan.bpkp.go.id",
            "category" => "umum",
        ]);
        Data::create([
            // "tahun" => "2023",
            // "bu_id" => "1",
            "deskripsi" => "KEBIJAKAN SISTEM PENGENDALIAN INTERN",
            // "link" => "https://dan.bpkp.go.id",
            "category" => "umum",
        ]);
        Data::create([
            // "tahun" => "2023",
            // "bu_id" => "1",
            "deskripsi" => "SOP INTERN",
            // "link" => "https://dan.bpkp.go.id",
            "category" => "umum",
        ]);
    }
}
