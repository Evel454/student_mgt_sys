@extends('layouts.page')

@section('page')
<h1>My registrations</h1>

@if ($registrations->count() == 0)
    <p>You have not registered for any course yet.</p>
@else
    <table>
        <tr>
            <th>Course code</th>
            <th>Title</th>
            <th>Academic year</th>
            <th>Semester</th>
            <th>Status</th>
        </tr>
        @foreach ($registrations as $registration)
            <tr>
                <td>{{ $registration->course->course_code }}</td>
                <td>{{ $registration->course->title }}</td>
                <td>{{ $registration->academic_year }}</td>
                <td>{{ $registration->semester }}</td>
                <td>{{ $registration->status }}</td>
            </tr>
        @endforeach
    </table>
@endif
@endsection