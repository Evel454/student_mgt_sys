@extends('layouts.main')

@section('title', 'Create account | MUBS Student Management System')
@section('description', 'Create your MUBS student portal account.')
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
                    <h1 class="text-xl font-bold text-slate-900">Create your student account</h1>
                    <p class="mt-1 text-sm text-slate-500">Use the registration number on your admission letter.</p>
                </div>
                <form data-demo-form="Account created. Please sign in." data-redirect="{{ route('login') }}" class="space-y-4">
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                        <label for="first_name" class="block text-sm font-medium text-slate-600 mb-2">First name <span class="text-red-500">*</span></label>
                        <input type="text" id="first_name" name="first_name" placeholder="Aisha" required class="input-field">
                    </div>
                        <div>
                        <label for="last_name" class="block text-sm font-medium text-slate-600 mb-2">Last name <span class="text-red-500">*</span></label>
                        <input type="text" id="last_name" name="last_name" placeholder="Namuli" required class="input-field">
                    </div>
                    </div>
                    <div>
                        <label for="reg_no" class="block text-sm font-medium text-slate-600 mb-2">Registration number <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400"><i data-lucide="hash" class="h-5 w-5"></i></div>
                            <input type="text" id="reg_no" name="reg_no" placeholder="26/U/0001" required class="input-field pl-10">
                        </div>
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-slate-600 mb-2">Student email <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400"><i data-lucide="mail" class="h-5 w-5"></i></div>
                            <input type="email" id="email" name="email" placeholder="you@students.mubs.ac.ug" required class="input-field pl-10">
                        </div>
                    </div>
                    <div>
                        <label for="programme" class="block text-sm font-medium text-slate-600 mb-2">Programme <span class="text-red-500">*</span></label>
                        <select id="programme" name="programme" required class="input-field"><option value="">Select…</option><option>Bachelor of Business Administration</option><option>Bachelor of Commerce</option><option>Bachelor of Science in Accounting</option><option>Bachelor of Information Technology</option><option>Bachelor of Human Resource Management</option></select>
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-slate-600 mb-2">Password <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400"><i data-lucide="lock" class="h-5 w-5"></i></div>
                            <input type="password" id="password" name="password" placeholder="At least 8 characters" required class="input-field pl-10">
                        </div>
                    </div>
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-slate-600 mb-2">Confirm password <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400"><i data-lucide="lock" class="h-5 w-5"></i></div>
                            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Repeat password" required class="input-field pl-10">
                        </div>
                    </div>
                    <button type="submit" class="w-full py-3 px-4 rounded-xl text-sm font-semibold text-white bg-[#2563eb] hover:bg-[#1d4ed8]">Create account</button>
                </form>
                <p class="mt-6 text-center text-sm text-slate-500">Already registered? <a href="{{ route('login') }}" class="text-[#2563eb]">Sign in</a></p>
            </div>
        </div>
    </div>
    <!-- End: Auth -->
    @include('layouts.footer')
@endsection
