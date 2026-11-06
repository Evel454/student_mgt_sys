@extends('layouts.page')

@section('page')
<h1>Add course</h1>

<form method="POST" action="{{ route('courses.store') }}">
    @csrf
    @include('courses._form')
</form>
@endsection