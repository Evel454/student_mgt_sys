<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'course_code' => fake()->unique()->bothify('???###'),
            'title' => fake()->sentence(3),
            'description' => fake()->optional()->paragraph(),
            'credit_units' => fake()->numberBetween(1, 6),
        ];
    }
}
