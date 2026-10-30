<?php

use App\Models\Course;
use App\Models\CourseRegistration;
use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('retrieves a students registered courses with registration details', function () {
    $student = Student::factory()->create();
    $course = Course::factory()->create();
    CourseRegistration::factory()
        ->for($student)
        ->for($course)
        ->create([
            'academic_year' => '2026/2027',
            'semester' => 1,
        ]);

    $this->getJson(route('students.courses', $student))
        ->assertOk()
        ->assertJsonPath('student.id', $student->id)
        ->assertJsonPath('courses.0.id', $course->id)
        ->assertJsonPath('courses.0.pivot.academic_year', '2026/2027')
        ->assertJsonPath('courses.0.pivot.semester', 1)
        ->assertJsonPath('courses.0.pivot.status', 'registered');
});

it('retrieves students registered for a course with registration details', function () {
    $student = Student::factory()->create();
    $course = Course::factory()->create();
    CourseRegistration::factory()
        ->for($student)
        ->for($course)
        ->create([
            'academic_year' => '2026/2027',
            'semester' => 2,
        ]);

    $this->getJson(route('courses.students', $course))
        ->assertOk()
        ->assertJsonPath('course.id', $course->id)
        ->assertJsonPath('students.0.id', $student->id)
        ->assertJsonPath('students.0.pivot.academic_year', '2026/2027')
        ->assertJsonPath('students.0.pivot.semester', 2)
        ->assertJsonPath('students.0.pivot.status', 'registered');
});
