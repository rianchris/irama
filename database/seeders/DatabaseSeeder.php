<?php

namespace Database\Seeders;

use App\Models\Deskripsiskor;
use App\Models\BadanUsaha;
use App\Models\BuParam;
use App\Models\User;
use App\Models\Param;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(MyProfileSeeder::class);
        $this->call(KlasterSeeder::class);
        $this->call(BadanUsahaSeeder::class);
        $this->call(DimensiSeeder::class);
        Param::factory(100)->create();
        Deskripsiskor::factory(2000)->create();
        BuParam::factory(100)->create();
        // $this->call(ParamSeeder::class);
        // User::factory(10)->create();
    }
}
