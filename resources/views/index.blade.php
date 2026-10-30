@extends('layouts.main')

@section('title', 'Home | MUBS Student Management System')
@section('description', 'Student records, course registration, results, attendance and fees for Makerere University Business School — in one portal.')

@section('content')
    @include('layouts.header')

    <!-- Start: Hero -->
    <section class="relative pt-20 bg-mesh">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
            <div class="grid lg:grid-cols-2 gap-10 lg:gap-16 items-center py-16 lg:py-24">
                <div class="text-center lg:text-left animate-fade-in">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-slate-200 bg-white mb-6">
                        <i data-lucide="calendar" class="w-4 h-4 text-[#d97706]"></i>
                        <span class="text-sm text-slate-500">Semester I 2026/27 registration is open</span>
                    </div>
                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold mb-5 leading-tight">
                        Every student record,<br>
                        <span class="text-gradient">in one place.</span>
                    </h1>
                    <p class="text-sm sm:text-base text-slate-500 max-w-xl mx-auto lg:mx-0 mb-6 leading-relaxed">
                        Register for course units, follow your results and pay fees from your phone. Lecturers keep registers and marks online, and the Registry sees everything as it happens.
                    </p>
                    <div class="grid gap-2 text-left max-w-xl mx-auto lg:mx-0 mb-8">
                        <div class="flex items-start gap-2 text-sm text-slate-600"><i data-lucide="check-circle-2" class="w-4 h-4 text-[#d97706] mt-0.5 shrink-0"></i><span>Results and CGPA update as soon as they are approved.</span></div>
                        <div class="flex items-start gap-2 text-sm text-slate-600"><i data-lucide="check-circle-2" class="w-4 h-4 text-[#d97706] mt-0.5 shrink-0"></i><span>Know your fee balance and get a payment reference instantly.</span></div>
                        <div class="flex items-start gap-2 text-sm text-slate-600"><i data-lucide="check-circle-2" class="w-4 h-4 text-[#d97706] mt-0.5 shrink-0"></i><span>See your attendance before it becomes a problem.</span></div>
                    </div>
                    <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                        <a href="{{ route('login') }}" class="group flex items-center gap-2 px-8 py-4 bg-[#2563eb] text-white rounded-xl font-semibold text-sm hover:bg-[#1d4ed8] glow-blue w-full sm:w-auto justify-center">
                            Sign in to the portal <i data-lucide="arrow-right" class="w-5 h-5 group-hover:translate-x-1 transition-transform"></i>
                        </a>
                        <a href="{{ route('register') }}" class="flex items-center justify-center gap-2 px-8 py-4 border border-slate-200 bg-white rounded-xl font-semibold text-sm text-slate-900 hover:border-[#2563eb]/40 w-full sm:w-auto">
                            New student? Register
                        </a>
                    </div>
                </div>

                <!-- Start: Hero card -->
                <div class="relative hero-float">
                    <div class="absolute -top-6 -right-6 w-40 h-40 rounded-full bg-[#fbbf24]/20 blur-3xl"></div>
                    <div class="relative rounded-2xl border border-slate-200 bg-white p-5 sm:p-6 shadow-xl">
                        <div class="flex items-center justify-between mb-5">
                            <div>
                                <p class="text-xs uppercase tracking-wider text-[#d97706] font-semibold">Semester snapshot</p>
                                <p class="text-lg font-semibold mt-1">Aisha Namuli · BBA Year 3</p>
                            </div>
                            <span class="text-xs px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-100">Active</span>
                        </div>
                        <div class="grid grid-cols-3 gap-3 mb-5">
                            <div class="rounded-xl bg-blue-50 p-3 text-center"><p class="text-xl font-bold text-[#2563eb]">4.32</p><p class="text-[11px] text-slate-500">CGPA</p></div>
                            <div class="rounded-xl bg-amber-50 p-3 text-center"><p class="text-xl font-bold text-[#d97706]">92%</p><p class="text-[11px] text-slate-500">Attendance</p></div>
                            <div class="rounded-xl bg-slate-50 p-3 text-center"><p class="text-xl font-bold">20</p><p class="text-[11px] text-slate-500">Credit units</p></div>
                        </div>
                        <div class="space-y-3">
                            <div class="flex items-center gap-3 p-3 rounded-xl border border-slate-200">
                                <div class="w-9 h-9 rounded-lg bg-blue-50 flex items-center justify-center shrink-0"><i data-lucide="book-open" class="w-4 h-4 text-[#2563eb]"></i></div>
                                <div class="flex-1 min-w-0"><p class="text-sm font-medium truncate">Strategic Management</p><p class="text-xs text-slate-500 mt-0.5">BBA 3101 · CA 26 / 30</p></div>
                                <span class="text-[11px] px-2 py-1 rounded-full bg-emerald-50 text-emerald-700">A</span>
                            </div>
                            <div class="flex items-center gap-3 p-3 rounded-xl border border-slate-200">
                                <div class="w-9 h-9 rounded-lg bg-amber-50 flex items-center justify-center shrink-0"><i data-lucide="calculator" class="w-4 h-4 text-[#d97706]"></i></div>
                                <div class="flex-1 min-w-0"><p class="text-sm font-medium truncate">Financial Management II</p><p class="text-xs text-slate-500 mt-0.5">BBA 3104 · CA 22 / 30</p></div>
                                <span class="text-[11px] px-2 py-1 rounded-full bg-blue-50 text-[#2563eb]">B+</span>
                            </div>
                            <div class="p-3 rounded-xl border border-slate-200">
                                <div class="flex justify-between text-xs mb-2"><span class="text-slate-500">Tuition paid</span><span class="font-semibold">75%</span></div>
                                <div class="bar-track"><div class="bar-fill gold" style="width:75%"></div></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End: Hero card -->
            </div>
        </div>
    </section>
    <!-- End: Hero -->

    <!-- Start: Numbers -->
    <section class="bg-[#0b1f4d]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
            <div><p class="text-3xl font-bold text-white">18,000+</p><p class="text-sm text-blue-200/70 mt-1">Students on record</p></div>
            <div><p class="text-3xl font-bold text-[#fbbf24]">40+</p><p class="text-sm text-blue-200/70 mt-1">Programmes</p></div>
            <div><p class="text-3xl font-bold text-white">600+</p><p class="text-sm text-blue-200/70 mt-1">Course units</p></div>
            <div><p class="text-3xl font-bold text-[#fbbf24]">24/7</p><p class="text-sm text-blue-200/70 mt-1">Online access</p></div>
        </div>
    </section>
    <!-- End: Numbers -->

    <!-- Start: Features -->
    <section id="features" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <p class="text-xs uppercase tracking-wider text-[#d97706] font-semibold mb-2">What you can do</p>
                <h2 class="text-3xl font-bold mb-3">Everything a semester needs</h2>
                <p class="text-slate-500">From admission to graduation, each step is tracked in the same record.</p>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
                <div class="bg-white border border-slate-200 rounded-xl shadow-sm p-6 hover:border-[#2563eb]/40 hover:shadow-md transition">
                    <div class="w-11 h-11 rounded-xl bg-blue-50 flex items-center justify-center mb-4"><i data-lucide="users" class="w-5 h-5 text-[#2563eb]"></i></div>
                    <h3 class="font-semibold mb-2">Student records</h3>
                    <p class="text-sm text-slate-500 leading-relaxed">Bio-data, programme, year of study, guardians and status for every student — searchable in seconds.</p>
                </div><div class="bg-white border border-slate-200 rounded-xl shadow-sm p-6 hover:border-[#2563eb]/40 hover:shadow-md transition">
                    <div class="w-11 h-11 rounded-xl bg-amber-50 flex items-center justify-center mb-4"><i data-lucide="list-checks" class="w-5 h-5 text-[#d97706]"></i></div>
                    <h3 class="font-semibold mb-2">Course registration</h3>
                    <p class="text-sm text-slate-500 leading-relaxed">Students pick their course units each semester; the system checks credit limits before submitting.</p>
                </div><div class="bg-white border border-slate-200 rounded-xl shadow-sm p-6 hover:border-[#2563eb]/40 hover:shadow-md transition">
                    <div class="w-11 h-11 rounded-xl bg-blue-50 flex items-center justify-center mb-4"><i data-lucide="award" class="w-5 h-5 text-[#2563eb]"></i></div>
                    <h3 class="font-semibold mb-2">Results & transcripts</h3>
                    <p class="text-sm text-slate-500 leading-relaxed">Lecturers enter coursework and exam marks; grades and CGPA are worked out automatically.</p>
                </div><div class="bg-white border border-slate-200 rounded-xl shadow-sm p-6 hover:border-[#2563eb]/40 hover:shadow-md transition">
                    <div class="w-11 h-11 rounded-xl bg-amber-50 flex items-center justify-center mb-4"><i data-lucide="user-check" class="w-5 h-5 text-[#d97706]"></i></div>
                    <h3 class="font-semibold mb-2">Attendance</h3>
                    <p class="text-sm text-slate-500 leading-relaxed">Mark a class register on a phone in under a minute and spot students at risk early.</p>
                </div><div class="bg-white border border-slate-200 rounded-xl shadow-sm p-6 hover:border-[#2563eb]/40 hover:shadow-md transition">
                    <div class="w-11 h-11 rounded-xl bg-blue-50 flex items-center justify-center mb-4"><i data-lucide="wallet" class="w-5 h-5 text-[#2563eb]"></i></div>
                    <h3 class="font-semibold mb-2">Fees & payments</h3>
                    <p class="text-sm text-slate-500 leading-relaxed">See tuition, what has been paid and the balance, then create a bank payment reference.</p>
                </div><div class="bg-white border border-slate-200 rounded-xl shadow-sm p-6 hover:border-[#2563eb]/40 hover:shadow-md transition">
                    <div class="w-11 h-11 rounded-xl bg-amber-50 flex items-center justify-center mb-4"><i data-lucide="calendar-days" class="w-5 h-5 text-[#d97706]"></i></div>
                    <h3 class="font-semibold mb-2">Timetables</h3>
                    <p class="text-sm text-slate-500 leading-relaxed">Each student sees only their own weekly lectures, rooms and lecturers.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- End: Features -->

    <!-- Start: How it works -->
    <section id="how-it-works" class="py-20 bg-slate-50 border-y border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <p class="text-xs uppercase tracking-wider text-[#d97706] font-semibold mb-2">How it works</p>
                <h2 class="text-3xl font-bold">Three steps each semester</h2>
            </div>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="bg-white border border-slate-200 rounded-xl shadow-sm p-6"><span class="w-9 h-9 rounded-full bg-[#2563eb] text-white flex items-center justify-center font-bold text-sm mb-4">1</span><h3 class="font-semibold mb-2">Sign in with your student email</h3><p class="text-sm text-slate-500">Use the account the Registry created when you were admitted.</p></div>
                <div class="bg-white border border-slate-200 rounded-xl shadow-sm p-6"><span class="w-9 h-9 rounded-full bg-[#d97706] text-white flex items-center justify-center font-bold text-sm mb-4">2</span><h3 class="font-semibold mb-2">Register your course units</h3><p class="text-sm text-slate-500">Tick the units for this semester and submit before the deadline.</p></div>
                <div class="bg-white border border-slate-200 rounded-xl shadow-sm p-6"><span class="w-9 h-9 rounded-full bg-[#2563eb] text-white flex items-center justify-center font-bold text-sm mb-4">3</span><h3 class="font-semibold mb-2">Follow your progress</h3><p class="text-sm text-slate-500">Check attendance, marks, results and fees whenever you need to.</p></div>
            </div>
        </div>
    </section>
    <!-- End: How it works -->

    <!-- Start: Portals -->
    <section id="portals" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <p class="text-xs uppercase tracking-wider text-[#d97706] font-semibold mb-2">Who uses it</p>
                <h2 class="text-3xl font-bold">One system, three portals</h2>
            </div>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="bg-white border border-[#2563eb] ring-1 ring-[#2563eb]/20 rounded-2xl p-6 flex flex-col">
                    <div class="w-12 h-12 rounded-xl bg-[#0b1f4d] flex items-center justify-center mb-4"><i data-lucide="graduation-cap" class="w-6 h-6 text-[#fbbf24]"></i></div>
                    <h3 class="text-lg font-semibold mb-2">Students</h3>
                    <p class="text-sm text-slate-500 mb-6 flex-1">Register for course units, check results, timetable, attendance and fees.</p>
                    <a href="{{ route('login', ['role' => 'student']) }}" class="inline-flex items-center gap-2 text-sm font-semibold text-[#2563eb] hover:gap-3 transition-all">Open student portal <i data-lucide="arrow-right" class="w-4 h-4"></i></a>
                </div><div class="bg-white border border-slate-200 rounded-2xl p-6 flex flex-col">
                    <div class="w-12 h-12 rounded-xl bg-[#0b1f4d] flex items-center justify-center mb-4"><i data-lucide="presentation" class="w-6 h-6 text-[#fbbf24]"></i></div>
                    <h3 class="text-lg font-semibold mb-2">Lecturers</h3>
                    <p class="text-sm text-slate-500 mb-6 flex-1">Keep class registers, enter marks and submit results to the Registry.</p>
                    <a href="{{ route('login', ['role' => 'lecturer']) }}" class="inline-flex items-center gap-2 text-sm font-semibold text-[#2563eb] hover:gap-3 transition-all">Open lecturer portal <i data-lucide="arrow-right" class="w-4 h-4"></i></a>
                </div><div class="bg-white border border-slate-200 rounded-2xl p-6 flex flex-col">
                    <div class="w-12 h-12 rounded-xl bg-[#0b1f4d] flex items-center justify-center mb-4"><i data-lucide="shield-check" class="w-6 h-6 text-[#fbbf24]"></i></div>
                    <h3 class="text-lg font-semibold mb-2">Registry</h3>
                    <p class="text-sm text-slate-500 mb-6 flex-1">Admit and manage students, courses and lecturers, and pull reports.</p>
                    <a href="{{ route('login', ['role' => 'admin']) }}" class="inline-flex items-center gap-2 text-sm font-semibold text-[#2563eb] hover:gap-3 transition-all">Open registry portal <i data-lucide="arrow-right" class="w-4 h-4"></i></a>
                </div>
            </div>
        </div>
    </section>
    <!-- End: Portals -->

    <!-- Start: CTA -->
    <section class="pb-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="rounded-3xl bg-gradient-to-br from-[#0b1f4d] to-[#1d4ed8] p-10 md:p-14 flex flex-col md:flex-row items-center justify-between gap-6">
                <div>
                    <h2 class="text-2xl md:text-3xl font-bold text-white mb-2">Ready for Semester I?</h2>
                    <p class="text-blue-100/80">Course registration closes on Friday, 13 November 2026.</p>
                </div>
                <a href="{{ route('login', ['role' => 'student']) }}" class="px-8 py-4 bg-[#f59e0b] hover:bg-[#d97706] text-[#0b1f4d] rounded-xl font-semibold text-sm whitespace-nowrap">Register my courses</a>
            </div>
        </div>
    </section>
    <!-- End: CTA -->

    @include('layouts.footer')
@endsection
