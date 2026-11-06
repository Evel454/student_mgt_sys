@extends('layouts.main')

@section('title', 'Sign in | MUBS Student Management System')
@section('description', 'Sign in to the MUBS Student Management System.')
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
                <div class="mb-6">
                    <h1 class="text-xl font-bold text-slate-900">Sign in</h1>
                    <p class="mt-1 text-sm text-slate-500">Choose your portal and use your MUBS email.</p>
                </div>
                <!-- Start: Sign in form -->
                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @include('layouts.toast')
    @csrf
                    <input type="hidden" name="role" value="{{ in_array(request('role'), ['student', 'lecturer', 'admin'], true) ? request('role') : 'student' }}">
                    <div class="grid grid-cols-3 gap-2">
                        <button type="button" data-role-option="student" class="flex flex-col items-center gap-1 text-xs font-medium px-2 py-3 rounded-xl border {{ request('role', 'student') === 'student' ? 'border-[#2563eb] bg-blue-50 text-[#2563eb]' : 'border-slate-200 text-slate-600' }}"><i data-lucide="graduation-cap" class="w-5 h-5"></i>Student</button>
                        <button type="button" data-role-option="lecturer" class="flex flex-col items-center gap-1 text-xs font-medium px-2 py-3 rounded-xl border {{ request('role') === 'lecturer' ? 'border-[#2563eb] bg-blue-50 text-[#2563eb]' : 'border-slate-200 text-slate-600' }}"><i data-lucide="presentation" class="w-5 h-5"></i>Lecturer</button>
                        <button type="button" data-role-option="admin" class="flex flex-col items-center gap-1 text-xs font-medium px-2 py-3 rounded-xl border {{ request('role') === 'admin' ? 'border-[#2563eb] bg-blue-50 text-[#2563eb]' : 'border-slate-200 text-slate-600' }}"><i data-lucide="shield-check" class="w-5 h-5"></i>Registry</button>
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-slate-600 mb-2">Email or registration number <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400"><i data-lucide="mail" class="h-5 w-5"></i></div>
                            <input type="text" id="email" name="email" placeholder="you@students.mubs.ac.ug" required class="input-field pl-10">
                        </div>
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-slate-600 mb-2">Password <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400"><i data-lucide="lock" class="h-5 w-5"></i></div>
                            <input type="password" id="password" name="password" placeholder="••••••••" required class="input-field pl-10">
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="remember" class="h-4 w-4 rounded border-slate-300 text-[#2563eb]">
                            <span class="text-sm text-slate-500">Keep me signed in</span>
                        </label>
                        <a href="{{ route('password.request') }}" class="text-sm font-medium text-[#2563eb] hover:text-[#1d4ed8]">Forgot password?</a>
                    </div>
                    <button type="submit" class="w-full py-3 px-4 rounded-xl text-sm font-semibold text-white bg-[#2563eb] hover:bg-[#1d4ed8]">Sign in</button>
                </form>
                <!-- End: Sign in form -->
                <!-- Start: Demo accounts -->
                <div class="mt-6 pt-6 border-t border-slate-200">
                    <p class="text-xs text-slate-500 mb-3 text-center">Prototype shortcuts</p>
                    <div class="grid grid-cols-3 gap-2">
                        <a href="{{ route('login', ['role' => 'student']) }}" class="text-center text-xs px-2 py-2 rounded-lg border border-slate-200 hover:border-[#2563eb]">Student</a>
                        <a href="{{ route('login', ['role' => 'lecturer']) }}" class="text-center text-xs px-2 py-2 rounded-lg border border-slate-200 hover:border-[#d97706]">Lecturer</a>
                        <a href="{{ route('login', ['role' => 'admin']) }}" class="text-center text-xs px-2 py-2 rounded-lg border border-slate-200 hover:border-[#2563eb]">Registry</a>
                    </div>
                </div>
                <!-- End: Demo accounts -->
                <p class="mt-6 text-center text-sm text-slate-500">New student? <a href="{{ route('register') }}" class="text-[#2563eb] hover:text-[#1d4ed8]">Create your account</a></p>
            </div>
        </div>
    </div>
    <!-- End: Auth -->
    @include('layouts.footer')
@endsection
