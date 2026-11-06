@extends('layouts.page')

@section('page')
<h1>Edit course</h1>

<form method="POST" action="{{ route('courses.update', $course) }}">
    @csrf
    @method('PUT')
    @include('courses._form')
</form>
@endsection