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
            'user_id' => 1,
            'name' => 'Administrator',
            'role' => 'admin',
        ]);
        MyProfile::create([
            'user_id' => 2,
            'name' => 'Pertamina',
            'role' => 'mitra',
        ]);
        MyProfile::create([
            'user_id' => 3,
            'name' => 'Mandiri',
            'role' => 'mitra',
        ]);
        MyProfile::create([
            'user_id' => 4,
            'name' => 'Yohana',
            'role' => 'warga',
        ]);
        MyProfile::create([
            'user_id' => 5,
            'name' => 'Putri',
            'role' => 'warga',
        ]);
        MyProfile::create([
            'user_id' => 6,
            'name' => 'Sani',
            'role' => 'warga',
        ]);
        MyProfile::create([
            'user_id' => 7,
            'name' => 'Gilang',
            'role' => 'warga',
        ]);
    }
}
