<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $role = ['warga',  'warga'];
        $nip = 19991213202302100;
        return [
            'username' => $this->faker->username,
            'name' => $this->faker->name,
            'password' => '123456', // password
            'remember_token' => Str::random(10),
            'role' => Arr::random($role),
            'nip_id' => $nip . mt_rand(1, 9)
            // 'email' => $this->faker->unique()->safeEmail,

        ];
    }
}
