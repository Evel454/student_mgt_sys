<?php

use App\Models\Course;
use App\Models\CourseRegistration;
use App\Models\Student;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Database\Seeders\StudentCourseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('seeds at least five students and four courses', function () {
    $seeder = new StudentCourseSeeder;
    $seeder->run();

    expect(Student::count())->toBeGreaterThanOrEqual(5)
        ->and(Course::count())->toBeGreaterThanOrEqual(4)
        ->and(CourseRegistration::count())->toBe(8)
        ->and(CourseRegistration::where('academic_year', '2026/2027')->where('semester', 1)->count())->toBe(8);
});

it('can be run repeatedly without creating duplicate students or courses', function () {
    $seeder = new StudentCourseSeeder;
    $seeder->run();
    $studentCount = Student::count();
    $courseCount = Course::count();
    $registrationCount = CourseRegistration::count();

    $seeder->run();

    expect(Student::count())->toBe($studentCount)
        ->and(Course::count())->toBe($courseCount)
        ->and(CourseRegistration::count())->toBe($registrationCount);
});

it('can run the complete database seeder repeatedly without duplicating sample records', function () {
    $seeder = new DatabaseSeeder;
    $seeder->run();
    $counts = [
        'users' => User::count(),
        'students' => Student::count(),
        'courses' => Course::count(),
        'registrations' => CourseRegistration::count(),
    ];

    $seeder->run();

    expect(User::count())->toBe($counts['users'])
        ->and(Student::count())->toBe($counts['students'])
        ->and(Course::count())->toBe($counts['courses'])
        ->and(CourseRegistration::count())->toBe($counts['registrations']);
});
