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
            'pertanyaan' => $this->faker->paragraph(),
            'per_info_d' => mt_rand(0, 1),
            'per_info_w' => mt_rand(0, 1),
            'per_info_k' => mt_rand(0, 1),
            'per_info_o' => mt_rand(0, 1),
            'catatan' => $this->faker->paragraph(),
            'hasil_reviu' => $this->faker->paragraph()
        ];
    }
}
