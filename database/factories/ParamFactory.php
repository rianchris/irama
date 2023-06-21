<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ParamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'dimensi_id' => mt_rand(1, 5),
            'tujuan' => $this->faker->paragraph(),
            'deskripsi' => $this->faker->paragraph(),
            'ref' => $this->faker->paragraph(),
            'pertanyaan' => $this->faker->paragraph(),
        ];
    }
}
