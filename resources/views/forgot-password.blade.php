@extends('layouts.main')

@section('title', 'Forgot password | MUBS Student Management System')
@section('description', 'Reset your MUBS Student Management System password.')
@section('body-class', 'bg-slate-50 text-slate-900 font-sans antialiased bg-mesh min-h-screen flex flex-col')

@section('content')
    @include('layouts.header')

    <!-- Start: Auth -->
    <div class="flex-1 flex items-center justify-center px-4 pt-32 pb-12">
        <div class="w-full max-w-md animate-fade-in">
            <!-- Start: Brand -->
            <a href="{{ route('index') }}" class="flex flex-col items-center mb-8">
                <img src="assets/img/logo.png" alt="MUBS" class="h-20 w-20 mb-3">
                <p class="text-lg font-semibold">Student Management System</p>
                <p class="text-sm text-slate-500">Makerere University Business School</p>
            </a>
            <!-- End: Brand -->
            <div class="rounded-2xl border border-slate-200 bg-white p-6 sm:p-8 shadow-xl shadow-slate-200/50">
                <div class="w-12 h-12 rounded-xl bg-amber-50 flex items-center justify-center mb-4"><i data-lucide="key-round" class="w-6 h-6 text-[#d97706]"></i></div>
                <h1 class="text-xl font-bold text-slate-900">Forgot your password?</h1>
                <p class="mt-1 mb-6 text-sm text-slate-500">Enter your MUBS email and we'll send you a reset link.</p>
                <form data-demo-form="Reset link sent — check your email" data-redirect="{{ route('login') }}" class="space-y-5">
                    <div>
                        <label for="email" class="block text-sm font-medium text-slate-600 mb-2">Email <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400"><i data-lucide="mail" class="h-5 w-5"></i></div>
                            <input type="email" id="email" name="email" placeholder="you@students.mubs.ac.ug" required class="input-field pl-10">
                        </div>
                    </div>
                    <button type="submit" class="w-full py-3 px-4 rounded-xl text-sm font-semibold text-white bg-[#2563eb] hover:bg-[#1d4ed8]">Send reset link</button>
                </form>
                <p class="mt-6 text-center text-sm text-slate-500"><a href="{{ route('login') }}" class="text-[#2563eb] inline-flex items-center gap-1"><i data-lucide="arrow-left" class="w-4 h-4"></i> Back to sign in</a></p>
            </div>
        </div>
    </div>
    <!-- End: Auth -->
    @include('layouts.footer')
@endsection
