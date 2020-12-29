<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
        return [
            'fio' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => Hash::make('123123'),
            'tel' => $this->faker->phoneNumber,
            'role_id' => rand(1,3),
        ];
    }
}
