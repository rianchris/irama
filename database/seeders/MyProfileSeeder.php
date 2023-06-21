<?php

namespace Database\Seeders;

use App\Models\MyProfile;
use Illuminate\Database\Seeder;

class MyProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MyProfile::create([
            'user_id' => '1',
            // 'badanusaha_id' => '731',
            'name' => 'Administrator',
            'role' => 'admin',
        ]);
        MyProfile::create([
            'user_id' => '2',
            // 'badanusaha_id' => '732',
            'name' => 'Pertamina',
            'role' => 'mitra',
        ]);
        MyProfile::create([
            'user_id' => '3',
            // 'badanusaha_id' => '733',
            'name' => 'Mandiri',
            'role' => 'mitra',
        ]);
        MyProfile::create([
            'user_id' => '4',
            // 'badanusaha_id' => '734',
            'name' => 'Yohana',
            'role' => 'mitra',
        ]);
        MyProfile::create([
            'user_id' => '5',
            // 'badanusaha_id' => '735',
            'name' => 'Putri',
            'role' => 'mitra',
        ]);
        MyProfile::create([
            'user_id' => '6',
            // 'badanusaha_id' => '736',
            'name' => 'Sani',
            'role' => 'mitra',
        ]);
        MyProfile::create([
            'user_id' => '7',
            // 'badanusaha_id' => '737',
            'name' => 'Gilang',
            'role' => 'mitra',
        ]);
    }
}
