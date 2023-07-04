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
        ]);
        User::create([
            'username' => 'yohana',
        ]);
        User::create([
            'username' => 'putri',
        ]);
        User::create([
            'username' => 'sani',
        ]);
        User::create([
            'username' => 'gilang',
        ]);
        // User::factory(10)->create(); // untuk memasukkan data dummy kedalam tabel user
    }
}
