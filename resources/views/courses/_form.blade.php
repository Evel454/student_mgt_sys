<p>
    <label>Course code</label><br>
    <input type="text" name="course_code"
        value="{{ old('course_code', isset($course) ? $course->course_code : '') }}">
</p>

<p>
    <label>Title</label><br>
    <input type="text" name="title"
        value="{{ old('title', isset($course) ? $course->title : '') }}">
</p>

<p>
    <label>Description</label><br>
    <textarea name="description" rows="3">{{ old('description', isset($course) ? $course->description : '') }}</textarea>
</p>

<p>
    <label>Credit units</label><br>
    <input type="number" name="credit_units"
        value="{{ old('credit_units', isset($course) ? $course->credit_units : '') }}">
</p>

<button type="submit">Save</button>
<a href="{{ route('courses.index') }}">Cancel</a>