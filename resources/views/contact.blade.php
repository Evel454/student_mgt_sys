@extends('layouts.main')

@section('title', 'Contact | MUBS Student Management System')
@section('description', 'Contact the MUBS Registry, Finance or ICT help desk.')

@section('content')
    @include('layouts.header')

    <section class="pt-32 pb-20 bg-mesh">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl mb-10">
                <p class="text-xs uppercase tracking-wider text-[#d97706] font-semibold mb-2">Contact us</p>
                <h1 class="text-3xl sm:text-4xl font-bold mb-3">Need help with your record?</h1>
                <p class="text-slate-500">Send a message or reach the right office directly. We reply within one working day.</p>
            </div>
            <div class="grid lg:grid-cols-5 gap-8">
                <div class="lg:col-span-2 space-y-4">
                    <div class="bg-white border border-slate-200 rounded-xl shadow-sm p-5 flex gap-4">
                        <div class="w-11 h-11 rounded-lg bg-blue-50 flex items-center justify-center shrink-0"><i data-lucide="building-2" class="w-5 h-5 text-[#2563eb]"></i></div>
                        <div><p class="font-semibold">Academic Registrar</p><p class="text-sm text-slate-500 mt-1">registrar@mubs.ac.ug</p><p class="text-sm text-slate-500">+256 414 338 120</p></div>
                    </div><div class="bg-white border border-slate-200 rounded-xl shadow-sm p-5 flex gap-4">
                        <div class="w-11 h-11 rounded-lg bg-blue-50 flex items-center justify-center shrink-0"><i data-lucide="wallet" class="w-5 h-5 text-[#2563eb]"></i></div>
                        <div><p class="font-semibold">Finance / Bursar</p><p class="text-sm text-slate-500 mt-1">finance@mubs.ac.ug</p><p class="text-sm text-slate-500">+256 414 338 121</p></div>
                    </div><div class="bg-white border border-slate-200 rounded-xl shadow-sm p-5 flex gap-4">
                        <div class="w-11 h-11 rounded-lg bg-blue-50 flex items-center justify-center shrink-0"><i data-lucide="monitor" class="w-5 h-5 text-[#2563eb]"></i></div>
                        <div><p class="font-semibold">ICT Help Desk</p><p class="text-sm text-slate-500 mt-1">ict@mubs.ac.ug</p><p class="text-sm text-slate-500">+256 414 338 122</p></div>
                    </div>
                    <div class="bg-white border border-slate-200 rounded-xl shadow-sm p-5 flex gap-4">
                        <div class="w-11 h-11 rounded-lg bg-amber-50 flex items-center justify-center shrink-0"><i data-lucide="map-pin" class="w-5 h-5 text-[#d97706]"></i></div>
                        <div><p class="font-semibold">Visit us</p><p class="text-sm text-slate-500 mt-1">Main Building, Port Bell Road, Nakawa — Kampala</p><p class="text-sm text-slate-500">Mon–Fri, 8:00am – 5:00pm</p></div>
                    </div>
                </div>
                <form data-demo-form="Message sent. We'll get back to you soon." data-reset class="lg:col-span-3 bg-white border border-slate-200 rounded-xl shadow-sm p-6 sm:p-8 space-y-4">
                    <div class="grid sm:grid-cols-2 gap-4">
                        <div>
                        <label for="name" class="block text-sm font-medium text-slate-600 mb-2">Full name <span class="text-red-500">*</span></label>
                        <input type="text" id="name" name="name" placeholder="Your name" required class="input-field">
                    </div>
                        <div>
                        <label for="email" class="block text-sm font-medium text-slate-600 mb-2">Email <span class="text-red-500">*</span></label>
                        <input type="email" id="email" name="email" placeholder="you@students.mubs.ac.ug" required class="input-field">
                    </div>
                    </div>
                    <div class="grid sm:grid-cols-2 gap-4">
                        <div>
                        <label for="reg_no" class="block text-sm font-medium text-slate-600 mb-2">Registration number</label>
                        <input type="text" id="reg_no" name="reg_no" placeholder="Optional" class="input-field">
                    </div>
                        <div>
                        <label for="office" class="block text-sm font-medium text-slate-600 mb-2">Office <span class="text-red-500">*</span></label>
                        <select id="office" name="office" required class="input-field"><option value="">Select…</option><option>Academic Registrar</option><option>Finance / Bursar</option><option>ICT Help Desk</option><option>Dean of Students</option></select>
                    </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-600 mb-2">Message <span class="text-red-500">*</span></label>
                        <textarea name="message" rows="5" required class="input-field" placeholder="How can we help?"></textarea>
                    </div>
                    <button type="submit" class="inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-[#2563eb] rounded-xl text-sm font-medium text-white hover:bg-[#1d4ed8]"><i data-lucide="send" class="w-4 h-4"></i> Send message</button>
                </form>
            </div>
        </div>
    </section>
    @include('layouts.footer')
@endsection
