<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    private function rules(?Course $course = null): array
    {
        return [
            'course_code' => 'required|string|max:255|unique:courses,course_code,' . $course?->id,
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'credit_units' => 'required|integer|min:1|max:20',
        ];
    }

    public function index()
    {
        $courses = Course::latest()->paginate(10);
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        Course::create($request->validate($this->rules()));
        return redirect()->route('courses.index')->with('success', 'Course added successfully.');
    }

    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $course->update($request->validate($this->rules($course)));
        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
    }
}