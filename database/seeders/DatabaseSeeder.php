<?php

namespace Database\Seeders;

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
        $this->call(MyprofileSeeder::class);
        $this->call(KlasterSeeder::class);
        $this->call(BuSeeder::class);
        $this->call(DimensiSeeder::class);
        $this->call(ParamSeeder::class);
        $this->call(DeskripsiskorSeeder::class);
        $this->call(BuParamSeeder::class);
        // $this->call(ParamSeeder::class);
        // Param::factory(100)->create();
        // Deskripsiskor::factory(500)->create();
        // BuParam::factory(700)->create();
        // Filependukung::factory(700)->create();
        // $this->call(ParamSeeder::class);
        // User::factory(10)->create();
    }
}
