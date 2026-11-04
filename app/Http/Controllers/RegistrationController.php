<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseRegistration;
use App\Models\Student;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function store(Request $request, Course $course)
    {
        $data = $request->validate([
            'academic_year' => 'required|string|max:255',
            'semester' => 'required|integer|in:1,2',
            'student_id' => 'nullable|exists:students,id',
        ]);

        $user = $request->user();

        if ($user->can('manage registrations') && ! empty($data['student_id'])) {
            $student = Student::findOrFail($data['student_id']);
        } else {
            $student = Student::where('email', $user->email)->first();
            if (! $student) {
                return back()->with('error', 'No student record is linked to your account.');
            }
        }

        $exists = CourseRegistration::where('student_id', $student->id)
            ->where('course_id', $course->id)
            ->where('academic_year', $data['academic_year'])
            ->where('semester', $data['semester'])
            ->exists();

        if ($exists) {
            return back()->with('error', $student->first_name . ' is already registered for ' . $course->title . ' this semester.');
        }

        CourseRegistration::create([
            'student_id' => $student->id,
            'course_id' => $course->id,
            'academic_year' => $data['academic_year'],
            'semester' => $data['semester'],
            'status' => 'registered',
        ]);

        return back()->with('success', 'Registered for ' . $course->title . ' successfully.');
    }

    public function mine(Request $request)
    {
        $student = Student::where('email', $request->user()->email)->first();
        $registrations = $student
            ? CourseRegistration::with('course')->where('student_id', $student->id)->get()
            : collect();

        return view('registrations.mine', compact('student', 'registrations'));
    }
}