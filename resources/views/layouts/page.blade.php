@extends('layouts.main')

@section('content')
    @include('layouts.header')
    <style>
        .app-page { color: #000; font-size: 1.0625rem; }
        .app-page h1, .app-page h2, .app-page h3, .app-page th { color: #000; font-weight: 800; }
        .app-page h1 { font-size: 2rem; }
        .app-page .text-sm { font-size: 1rem !important; }
        .app-page .text-slate-500, .app-page .text-slate-600, .app-page .text-slate-400 { color: #000 !important; }
        .app-page input, .app-page select, .app-page textarea { color: #000; font-size: 1rem; border-radius: 0.75rem; }

        /* Green, rounded buttons */
        .app-page button,
        .app-page a[href*="create"] {
            background-color: #16a34a !important;
            color: #fff !important;
            border: none !important;
            border-radius: 9999px !important;
            padding: 0.5rem 1.25rem !important;
            font-weight: 600;
            cursor: pointer;
            transition: background-color .2s;
        }
        .app-page button:hover,
        .app-page a[href*="create"]:hover {
            background-color: #15803d !important;
        }

        /* Keep Delete red */
        .app-page button.text-red-600 {
            background-color: #dc2626 !important;
        }
        .app-page button.text-red-600:hover {
            background-color: #b91c1c !important;
        }
    </style>
    <main class="app-page max-w-6xl mx-auto px-4 pt-28 pb-16 min-h-screen">
        @include('layouts.toast')
        @yield('page')
    </main>
    @include('layouts.footer')
@endsection