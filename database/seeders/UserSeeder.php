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
            'username' => 'gilang',
        ]);
        User::create([
            'username' => 'putri123',
        ]);
        User::create([
            'username' => 'sani123',
        ]);

        // User::factory(10)->create(); // untuk memasukkan data dummy kedalam tabel user
    }
}
