<footer class="bg-[#0b1f4d]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 grid gap-8 md:grid-cols-4">
        <div class="md:col-span-2">
            <div class="flex items-center gap-3 mb-3">
                <img src="{{ asset('assets/img/logo.png') }}" alt="MUBS" class="h-10 w-10 bg-white rounded-full p-0.5">
                <p class="text-white font-semibold">Student Management System</p>
            </div>
            <p class="text-sm text-blue-100/70 max-w-sm">One place for student records, course registration, results, attendance and fees at Makerere University Business School.</p>
        </div>
        <div>
            <p class="text-xs uppercase tracking-wider text-[#fbbf24] font-semibold mb-3">Portals</p>
            <ul class="space-y-2 text-sm text-blue-100/80">
                <li><a href="{{ route('login', ['role' => 'student']) }}" class="hover:text-white">Student portal</a></li>
                <li><a href="{{ route('login', ['role' => 'lecturer']) }}" class="hover:text-white">Lecturer portal</a></li>
                <li><a href="{{ route('login', ['role' => 'admin']) }}" class="hover:text-white">Registry portal</a></li>
            </ul>
        </div>
        <div>
            <p class="text-xs uppercase tracking-wider text-[#fbbf24] font-semibold mb-3">Help</p>
            <ul class="space-y-2 text-sm text-blue-100/80">
                <li><a href="{{ route('contact') }}" class="hover:text-white">Contact the Registry</a></li>
                <li><a href="{{ route('password.request') }}" class="hover:text-white">Reset password</a></li>
                <li>Mon–Fri, 8:00am – 5:00pm</li>
            </ul>
        </div>
    </div>
    <div class="border-t border-white/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex flex-col md:flex-row justify-between items-center gap-2">
            <p class="text-sm text-blue-100/80">© <span data-year>2026</span> <span class="font-semibold text-white">MUBS Student Management System</span>. All rights reserved.</p>
            <p class="text-sm text-blue-200/70">Registry · Faculties · Finance · ICT</p>
        </div>
    </div>
</footer>