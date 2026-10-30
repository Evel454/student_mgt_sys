<?php

use App\Models\Course;
use App\Models\CourseRegistration;
use App\Models\Student;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('links students and courses through a course registration', function () {
    $student = Student::factory()->create();
    $course = Course::factory()->create();
    $registration = CourseRegistration::factory()
        ->for($student)
        ->for($course)
        ->create([
            'academic_year' => '2026/2027',
            'semester' => 1,
        ]);

    expect($student->courses)->toHaveCount(1)
        ->and($student->courses->first()->pivot->academic_year)->toBe('2026/2027')
        ->and($registration->student->is($student))->toBeTrue()
        ->and($registration->course->is($course))->toBeTrue();
});

it('prevents a student registering for the same course twice in a semester', function () {
    $student = Student::factory()->create();
    $course = Course::factory()->create();
    $period = [
        'academic_year' => '2026/2027',
        'semester' => 1,
    ];

    CourseRegistration::factory()
        ->for($student)
        ->for($course)
        ->create($period);

    expect(fn () => CourseRegistration::factory()
        ->for($student)
        ->for($course)
        ->create($period))
        ->toThrow(QueryException::class);
});

it('rejects registrations for students or courses that do not exist', function () {
    expect(fn () => CourseRegistration::factory()->create([
        'student_id' => 999999,
    ]))->toThrow(QueryException::class);

    expect(fn () => CourseRegistration::factory()->create([
        'course_id' => 999999,
    ]))->toThrow(QueryException::class);
});

it('deletes registrations when their student or course is deleted', function () {
    $student = Student::factory()->create();
    $course = Course::factory()->create();
    $registration = CourseRegistration::factory()
        ->for($student)
        ->for($course)
        ->create();

    $student->delete();

    expect(CourseRegistration::find($registration->id))->toBeNull();

    $student = Student::factory()->create();
    $registration = CourseRegistration::factory()
        ->for($student)
        ->for($course)
        ->create();

    $course->delete();

    expect(CourseRegistration::find($registration->id))->toBeNull();
});
