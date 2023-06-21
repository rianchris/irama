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
        Param::create([
            'dimensi_id' => '1',
            'deskripsi' => 'Setiap insan Perusahaan memahami visi dan misi perusahaan.',
            'pertanyaan' => 'Apakah memiliki perusahaan memiliki visi dan misi yang ditetapkan secara formal dan telah dipahami oleh seluruh pegawai?',
            'dskor_0' => 'Semua insan perusahaan tidak memahami visi dan misi',
            'dskor_1' => 'Hanya Direksi dan Dekom memahami visi dan misi perusahaan',
            'dskor_2' => 'Visi dan misi telah dipahami Direksi & Dekom dan sebagian kecil middle management (Kadiv) ',
            'dskor_3' => 'Sebagian besar Kadiv dan pegawai memahami visi dan misi perusahaan (50%-75%)',
            'dskor_4' => 'Sebagian besar Kadiv dan pegawai memahami visi dan misi perusahaan (>=75%',
            'dskor_5' => 'Seluruh insan perusahaan memahami visi dan misi perusahaan (>95%)',
            'per_info_d' => 1,
            'per_info_w' => 1,
            'per_info_k' => 0,
            'per_info_o' => 0,
            // 'sumber_info' => '',
            'catatan' => '',
            'hasil_reviu' => '',
        ]);
        Param::create([
            'dimensi_id' => '1',
            'deskripsi' => '',
            'pertanyaan' => 'Apakah memiliki perusahaan memiliki visi dan misi yang ditetapkan secara formal dan telah dipahami oleh seluruh pegawai?',
            'dskor_0' => 'Semua insan perusahaan tidak memahami visi dan misi',
            'dskor_1' => 'Hanya Direksi dan Dekom memahami visi dan misi perusahaan',
            'dskor_2' => 'Visi dan misi telah dipahami Direksi & Dekom dan sebagian kecil middle management (Kadiv) ',
            'dskor_3' => 'Sebagian besar Kadiv dan pegawai memahami visi dan misi perusahaan (50%-75%)',
            'dskor_4' => 'Sebagian besar Kadiv dan pegawai memahami visi dan misi perusahaan (>=75%',
            'dskor_5' => 'Seluruh insan perusahaan memahami visi dan misi perusahaan (>95%)',
            'per_info_d' => 1,
            'per_info_w' => 1,
            'per_info_k' => 0,
            'per_info_o' => 0,
            // 'sumber_info' => '',
            'catatan' => '',
            'hasil_reviu' => '',
        ]);
        Param::create([
            'dimensi_id' => '2',
            'deskripsi' => 'Setiap insan Perusahaan memahami visi dan misi perusahaan.',
            'pertanyaan' => 'Apakah memiliki perusahaan memiliki visi dan misi yang ditetapkan secara formal dan telah dipahami oleh seluruh pegawai?',
            'dskor_0' => 'Semua insan perusahaan tidak memahami visi dan misi',
            'dskor_1' => 'Hanya Direksi dan Dekom memahami visi dan misi perusahaan',
            'dskor_2' => 'Visi dan misi telah dipahami Direksi & Dekom dan sebagian kecil middle management (Kadiv) ',
            'dskor_3' => 'Sebagian besar Kadiv dan pegawai memahami visi dan misi perusahaan (50%-75%)',
            'dskor_4' => 'Sebagian besar Kadiv dan pegawai memahami visi dan misi perusahaan (>=75%',
            'dskor_5' => 'Seluruh insan perusahaan memahami visi dan misi perusahaan (>95%)',
            'per_info_d' => 1,
            'per_info_w' => 1,
            'per_info_k' => 0,
            'per_info_o' => 0,
            // 'sumber_info' => '',
            'catatan' => '',
            'hasil_reviu' => '',
        ]);
        Param::create([
            'dimensi_id' => '3',
            'deskripsi' => '',
            'pertanyaan' => 'Apakah memiliki perusahaan memiliki visi dan misi yang ditetapkan secara formal dan telah dipahami oleh seluruh pegawai?',
            'dskor_0' => 'Semua insan perusahaan tidak memahami visi dan misi',
            'dskor_1' => 'Hanya Direksi dan Dekom memahami visi dan misi perusahaan',
            'dskor_2' => 'Visi dan misi telah dipahami Direksi & Dekom dan sebagian kecil middle management (Kadiv) ',
            'dskor_3' => 'Sebagian besar Kadiv dan pegawai memahami visi dan misi perusahaan (50%-75%)',
            'dskor_4' => 'Sebagian besar Kadiv dan pegawai memahami visi dan misi perusahaan (>=75%',
            'dskor_5' => 'Seluruh insan perusahaan memahami visi dan misi perusahaan (>95%)',
            'per_info_d' => 1,
            'per_info_w' => 1,
            'per_info_k' => 0,
            'per_info_o' => 0,
            // 'sumber_info' => '',
            'catatan' => '',
            'hasil_reviu' => '',
        ]);
    }
}
