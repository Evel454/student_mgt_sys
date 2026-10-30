<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\JsonResponse;

class CourseRegistrationController extends Controller
{
    public function studentCourses(Student $student): JsonResponse
    {
        return response()->json([
            'student' => $student->only(['id', 'first_name', 'last_name', 'registration_number']),
            'courses' => $student->courses()->get(),
        ]);
    }

    public function courseStudents(Course $course): JsonResponse
    {
        return response()->json([
            'course' => $course->only(['id', 'course_code', 'title']),
            'students' => $course->students()->get(),
        ]);
    }
}
