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
            'username' => 'adminirama',
            'password' => bcrypt('iramaadmin'),
        ]);
        User::create([
            'username' => 'yohana',
            'password' => bcrypt('yohana'),
        ]);
        User::create([
            'username' => 'putri',
            'password' => bcrypt('putri'),
        ]);
        User::create([
            'username' => 'sani',
            'password' => bcrypt('sani'),
        ]);
        User::create([
            'username' => 'gilang',
            'password' => bcrypt('gilang'),
        ]);
        User::create([
            'nip_id' => '19991312202302004',
        ]);

        // User::factory(10)->create(); // untuk memasukkan data dummy kedalam tabel user
    }
}
