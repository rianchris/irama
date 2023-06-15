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
            'profile_id' => 1,
        ]);
        User::create([
            'username' => 'pertamina',
            'password' => bcrypt('pertamina'),
            'profile_id' => 2,
        ]);
        User::create([
            'username' => 'mandiri',
            'password' => bcrypt('mandiri'),
            'profile_id' => 3,
        ]);
        User::create([
            'nip_id' => '19991312202302001',
            'username' => 'yohana',
            'password' => bcrypt('yohana'),
            'profile_id' => 4,
        ]);
        User::create([
            'nip_id' => '19991312202302002',
            'username' => 'putri',
            'password' => bcrypt('putri'),
            'profile_id' => 5,
        ]);
        User::create([
            'nip_id' => '19991312202302003',
            'username' => 'sani',
            'password' => bcrypt('sani'),
            'profile_id' => 6,
        ]);
        User::create([
            'nip_id' => '19991312202302004',
            'username' => 'gilang',
            'password' => bcrypt('gilang'),
            'profile_id' => 7,
        ]);
        // User::factory(10)->create(); // untuk memasukkan data dummy kedalam tabel user
    }
}
