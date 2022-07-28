<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class adminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'img' => $this->faker,
            'email' => $this->faker->email,
            'address' => $this->faker->address,
            'phone' => $this->faker,
            'password' => $this->faker->password,
        ];
    }
}
