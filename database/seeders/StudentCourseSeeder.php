<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\CourseRegistration;
use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentCourseSeeder extends Seeder
{
    public function run(): void
    {
        $students = [
            [
                'first_name' => 'Aisha',
                'last_name' => 'Namuli',
                'registration_number' => '23/U/0457',
                'email' => 'aisha.namuli@students.mubs.ac.ug',
                'programme' => 'Bachelor of Business Administration',
            ],
            [
                'first_name' => 'Brian',
                'last_name' => 'Okello',
                'registration_number' => '23/U/0512',
                'email' => 'brian.okello@students.mubs.ac.ug',
                'programme' => 'Bachelor of Commerce',
            ],
            [
                'first_name' => 'Doreen',
                'last_name' => 'Atim',
                'registration_number' => '24/U/0108',
                'email' => 'doreen.atim@students.mubs.ac.ug',
                'programme' => 'Bachelor of Science in Accounting',
            ],
            [
                'first_name' => 'Kenneth',
                'last_name' => 'Mugisha',
                'registration_number' => '22/U/0931',
                'email' => 'kenneth.mugisha@students.mubs.ac.ug',
                'programme' => 'Bachelor of Information Technology',
            ],
            [
                'first_name' => 'Sharon',
                'last_name' => 'Nakato',
                'registration_number' => '24/U/0244',
                'email' => 'sharon.nakato@students.mubs.ac.ug',
                'programme' => 'Bachelor of Human Resource Management',
            ],
        ];

        foreach ($students as $student) {
            Student::updateOrCreate(
                ['registration_number' => $student['registration_number']],
                $student
            );
        }

        $courses = [
            [
                'course_code' => 'BBA1101',
                'title' => 'Introduction to Business Administration',
                'description' => 'Foundations of business administration and management.',
                'credit_units' => 3,
            ],
            [
                'course_code' => 'BBA1202',
                'title' => 'Business Communication',
                'description' => 'Communication skills for professional business settings.',
                'credit_units' => 3,
            ],
            [
                'course_code' => 'ACC2101',
                'title' => 'Financial Accounting',
                'description' => 'Principles and practice of financial accounting.',
                'credit_units' => 4,
            ],
            [
                'course_code' => 'BIT2203',
                'title' => 'Database Management Systems',
                'description' => 'Relational database design, querying, and management.',
                'credit_units' => 4,
            ],
        ];

        foreach ($courses as $course) {
            Course::updateOrCreate(
                ['course_code' => $course['course_code']],
                $course
            );
        }

        $registrations = [
            ['registration_number' => '23/U/0457', 'course_code' => 'BBA1101'],
            ['registration_number' => '23/U/0457', 'course_code' => 'BBA1202'],
            ['registration_number' => '23/U/0512', 'course_code' => 'BBA1101'],
            ['registration_number' => '23/U/0512', 'course_code' => 'ACC2101'],
            ['registration_number' => '24/U/0108', 'course_code' => 'ACC2101'],
            ['registration_number' => '24/U/0108', 'course_code' => 'BBA1202'],
            ['registration_number' => '22/U/0931', 'course_code' => 'BIT2203'],
            ['registration_number' => '24/U/0244', 'course_code' => 'BBA1202'],
        ];

        foreach ($registrations as $registration) {
            $student = Student::where('registration_number', $registration['registration_number'])->firstOrFail();
            $course = Course::where('course_code', $registration['course_code'])->firstOrFail();

            CourseRegistration::updateOrCreate(
                [
                    'student_id' => $student->id,
                    'course_id' => $course->id,
                    'academic_year' => '2026/2027',
                    'semester' => 1,
                ],
                ['status' => 'registered']
            );
        }
    }
}
