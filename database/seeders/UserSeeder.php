<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {

        User::create([
            'username' => 'antimodal',
            'password' => bcrypt('antimodal'),
        ]);
        User::create([
            'nip_id' => '19991312202302001',
            'username' => 'yohana',
            'password' => bcrypt('yohana'),
        ]);
        User::create([
            'nip_id' => '19991312202302002',
            'username' => 'putri',
            'password' => bcrypt('putri'),
        ]);
        User::create([
            'nip_id' => '19991312202302003',
            'username' => 'sani',
            'password' => bcrypt('sani'),
        ]);
        User::create([
            'nip_id' => '19991312202302004',
            'username' => 'gilang',
            'password' => bcrypt('gilang'),
        ]);
        // User::factory(10)->create(); // untuk memasukkan data dummy kedalam tabel user
    }
}
