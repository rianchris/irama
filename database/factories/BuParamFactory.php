<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class BuParamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'badan_usaha_id' => $this->faker->numberBetween(1, 7),
            'param_id' => $this->faker->unique()->numberBetween(1, 100),
            // 'skorparam_id' => $this->faker->unique()->numberBetween(1, 100),
            'skorparam' => mt_rand(1, 5)
        ];
    }
}
