<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;

class StudentUserSeeder extends Seeder
{
    public function run(): void
    {
        // A demo student so student@mubs.ac.ug also has a student record
        Student::firstOrCreate(
            ['email' => 'student@mubs.ac.ug'],
            [
                'first_name' => 'Sample',
                'last_name' => 'Student',
                'registration_number' => '26/U/0001',
                'programme' => 'Bachelor of Business Computing',
            ]
        );

        // Create one login for every student record
        $students = Student::all();

        foreach ($students as $student) {
            $user = User::firstOrCreate(
                ['email' => $student->email],
                [
                    'name' => $student->first_name . ' ' . $student->last_name,
                    'password' => 'password123',
                    'role' => 'student',
                ]
            );

            $user->syncRoles('student');
        }
    }
}