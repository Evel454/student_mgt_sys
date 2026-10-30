<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'registration_number' => fake()->unique()->numerify('##/U/####'),
            'email' => fake()->unique()->safeEmail(),
            'programme' => fake()->randomElement([
                'Bachelor of Business Administration',
                'Bachelor of Commerce',
                'Bachelor of Science in Accounting',
                'Bachelor of Information Technology',
                'Bachelor of Human Resource Management',
            ]),
        ];
    }
}
