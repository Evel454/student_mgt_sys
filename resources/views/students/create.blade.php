@extends('layouts.page')

@section('page')
<h1 class="text-2xl font-bold mb-6">Add student</h1>
<form method="POST" action="{{ route('students.store') }}">
    @csrf
    @include('students._form')
</form>
@endsection