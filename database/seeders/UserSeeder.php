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
            // 'my_profile_id' => 1,
        ]);
        User::create([
            'username' => 'pertamina',
            'password' => bcrypt('pertamina'),
            // 'my_profile_id' => 2,
        ]);
        User::create([
            'username' => 'mandiri',
            'password' => bcrypt('mandiri'),
            // 'my_profile_id' => 3,
        ]);
        User::create([
            'nip_id' => '19991312202302001',
            'username' => 'yohana',
            'password' => bcrypt('yohana'),
            // 'my_profile_id' => 4,
        ]);
        User::create([
            'nip_id' => '19991312202302002',
            'username' => 'putri',
            'password' => bcrypt('putri'),
            // 'my_profile_id' => 5,
        ]);
        User::create([
            'nip_id' => '19991312202302003',
            'username' => 'sani',
            'password' => bcrypt('sani'),
            // 'my_profile_id' => 6,
        ]);
        User::create([
            'nip_id' => '19991312202302004',
            'username' => 'gilang',
            'password' => bcrypt('gilang'),
            // 'my_profile_id' => 7,
        ]);
        // User::factory(10)->create(); // untuk memasukkan data dummy kedalam tabel user
    }
}
