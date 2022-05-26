<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->name(),
            'last_name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'gender' => $this->faker->randomElement(['Masculino', 'Femenino']),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'birthday' => $this->faker->date(),
        ];
    }
}
