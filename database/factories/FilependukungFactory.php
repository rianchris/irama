<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class FilependukungFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $tipefile = ['pdf', 'docx', 'xlsx'];
        return [
            'namafile' => $this->faker->paragraph(),
            'tipefile' => Arr::random($tipefile),
        ];
    }
}
