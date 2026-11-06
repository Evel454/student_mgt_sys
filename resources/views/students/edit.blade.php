@extends('layouts.page')

@section('page')
<h1 class="text-2xl font-bold mb-6">Edit student</h1>
<form method="POST" action="{{ route('students.update', $student) }}">
    @csrf @method('PUT')
    @include('students._form')
</form>
@endsection