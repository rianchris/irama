<?php

namespace Database\Seeders;

use App\Models\Myprofile;
use Illuminate\Database\Seeder;

class MyprofileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Myprofile::create([
            'user_id' => '1',
            'name' => 'Administrator',
            'role' => 'admin',
        ]);
        Myprofile::create([
            'user_id' => '2',
            'name' => 'Yohana',
            'role' => 'mitra',
        ]);
        Myprofile::create([
            'user_id' => '3',
            'name' => 'Putri',
            'role' => 'mitra',
        ]);
        Myprofile::create([
            'user_id' => '4',
            'name' => 'Sani',
            'role' => 'mitra',
        ]);
        Myprofile::create([
            'user_id' => '5',
            'name' => 'Gilang',
            'role' => 'mitra',
        ]);
    }
}
