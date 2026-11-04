@extends('layouts.main')

@section('content')
    @include('layouts.header')
    <main class="max-w-6xl mx-auto px-4 pt-28 pb-16 min-h-screen">
        @include('layouts.messages')
        @yield('page')
    </main>
    @include('layouts.footer')
@endsection