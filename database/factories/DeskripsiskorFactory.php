<?php

namespace Database\Factories;

use App\Models\Param;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeskripsiskorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'param_id' => mt_rand(1, 100),
            'deskripsi' => $this->faker->paragraph(),
        ];
    }
}
