<?php

namespace Database\Factories;

use App\Models\Semester;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'course_name' => $this->faker->name(),
            'course_description' => $this->faker->word(300),
            'semester_id' => Semester::all()->random()->id,
        ];
    }
}
