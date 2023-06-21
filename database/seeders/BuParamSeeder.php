<?php

namespace Database\Seeders;

use App\Models\Param;
use App\Models\BuParam;
use App\Models\BadanUsaha;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class BuParamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = new Faker();

        $bu = BadanUsaha::pluck('id')->toArray();
        $param = Param::pluck('id')->toArray();

        foreach (range(1, 100) as $index) {
            $bus = $faker->randomElement($bu);
            $params = $faker->randomElement($param);

            // Create a post with the generated foreign keys
            // Example: 
            BuParam::create([
                'bu_id' => $bus,
                'param_id' => $params
            ]);
        }
    }
}
