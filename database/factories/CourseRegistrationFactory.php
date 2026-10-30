<?php

namespace Database\Factories;

use App\Models\CourseRegistration;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<CourseRegistration>
 */
class CourseRegistrationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => Student::factory(),
            'course_id' => Course::factory(),
            'academic_year' => now()->year.'/'.(now()->year + 1),
            'semester' => fake()->numberBetween(1, 2),
            'status' => 'registered',
        ];
    }
}
