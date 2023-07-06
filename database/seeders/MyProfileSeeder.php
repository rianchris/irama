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
            'name' => 'Gilang',
            'role' => 'mitra',
        ]);
        Myprofile::create([
            'user_id' => '4',
            'name' => 'Putri',
            'role' => 'warga',
        ]);
        Myprofile::create([
            'user_id' => '5',
            'name' => 'Sani',
            'role' => 'warga',
        ]);
    }
}
