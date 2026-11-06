@php
    $link = 'whitespace-nowrap text-base font-semibold transition-colors';
    $idle = 'text-black hover:text-[#2563eb]';
    $on   = 'text-[#2563eb]';
@endphp
<header class="fixed top-0 left-0 right-0 z-50 bg-white/95 backdrop-blur border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20 gap-6">

            {{-- Logo --}}
            <a href="{{ route('index') }}" class="flex items-center gap-3 shrink-0">
                <img src="{{ asset('assets/img/logo.png') }}" alt="MUBS" class="h-11 w-11">
                <div class="hidden xl:block">
                    <p class="text-sm font-semibold text-slate-900 leading-tight whitespace-nowrap">Student Management System</p>
                    <p class="text-[11px] text-slate-500 whitespace-nowrap">Makerere University Business School</p>
                </div>
            </a>

            {{-- Desktop navigation --}}
            <nav class="hidden lg:flex items-center gap-7">
                <a href="{{ route('index') }}" class="{{ $link }} {{ request()->routeIs('index') ? $on : $idle }}">Home</a>

                @guest
                    <a href="{{ route('index') }}#features" class="{{ $link }} {{ $idle }}">Features</a>
                    <a href="{{ route('index') }}#portals" class="{{ $link }} {{ $idle }}">Portals</a>
                    <a href="{{ route('contact') }}" class="{{ $link }} {{ $idle }}">Contact</a>
                    <a href="{{ route('contactlist') }}" class="{{ $link }} {{ $idle }}">Contact list</a>
                @endguest

                @auth
                    @if (auth()->user()->can('manage students'))
                        <a href="{{ route('students.index') }}" class="{{ $link }} {{ request()->routeIs('students.*') ? $on : $idle }}">Students</a>
                    @endif
                    @if (auth()->user()->can('manage courses') || auth()->user()->can('view available courses'))
                        <a href="{{ route('courses.index') }}" class="{{ $link }} {{ request()->routeIs('courses.index', 'courses.create', 'courses.edit') ? $on : $idle }}">Courses</a>
                    @endif
                    @if (auth()->user()->can('view own registrations'))
                        <a href="{{ route('registrations.mine') }}" class="{{ $link }} {{ request()->routeIs('registrations.mine') ? $on : $idle }}">My registrations</a>
                    @endif
                    @if (auth()->user()->can('view assigned courses'))
                        <a href="{{ route('courses.students', 1) }}" class="{{ $link }} {{ request()->routeIs('courses.students') ? $on : $idle }}">My courses</a>
                    @endif
                @endauth
            </nav>

            {{-- Right side --}}
            <div class="hidden lg:flex items-center gap-3 shrink-0">
                @guest
                    <a href="{{ route('login') }}" class="whitespace-nowrap px-5 py-2.5 border border-slate-200 text-slate-900 rounded-lg font-medium text-sm hover:border-[#2563eb]/40">Sign in</a>
                    <a href="{{ route('register') }}" class="whitespace-nowrap px-5 py-2.5 bg-[#2563eb] text-white rounded-lg font-medium text-sm hover:bg-[#1d4ed8] glow-blue">Apply / Register</a>
                @endguest

                @auth
                    <div class="flex items-center gap-2">
                        <span class="h-9 w-9 rounded-full bg-[#0b1f4d] text-[#fbbf24] flex items-center justify-center text-sm font-semibold">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </span>
                        <div class="leading-tight">
                            <p class="text-sm font-medium text-slate-900 whitespace-nowrap">{{ auth()->user()->name }}</p>
                            <p class="text-[11px] uppercase tracking-wide text-[#d97706] font-semibold">{{ auth()->user()->role }}</p>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="whitespace-nowrap px-4 py-2 border border-slate-200 text-slate-900 rounded-lg font-medium text-sm hover:border-[#2563eb]/40">Logout</button>
                    </form>
                @endauth
            </div>

            {{-- Mobile menu button --}}
            <button type="button" data-mobile-nav class="lg:hidden p-2 text-slate-900"><i data-lucide="menu" class="w-6 h-6"></i></button>
        </div>

        {{-- Mobile navigation --}}
        <div id="mobile-nav" class="hidden lg:hidden py-4 border-t border-slate-200">
            <div class="flex flex-col gap-4">
                <a href="{{ route('index') }}" class="{{ $link }} {{ $idle }}">Home</a>

                @guest
                    <a href="{{ route('index') }}#features" class="{{ $link }} {{ $idle }}">Features</a>
                    <a href="{{ route('index') }}#portals" class="{{ $link }} {{ $idle }}">Portals</a>
                    <a href="{{ route('contact') }}" class="{{ $link }} {{ $idle }}">Contact</a>
                    <a href="{{ route('contactlist') }}" class="{{ $link }} {{ $idle }}">Contact list</a>
                    <a href="{{ route('login') }}" class="px-5 py-2.5 border border-slate-200 rounded-lg font-medium text-sm text-center">Sign in</a>
                    <a href="{{ route('register') }}" class="px-5 py-2.5 bg-[#2563eb] text-white rounded-lg font-medium text-sm text-center">Apply / Register</a>
                @endguest

                @auth
                    @if (auth()->user()->can('manage students'))
                        <a href="{{ route('students.index') }}" class="{{ $link }} {{ $idle }}">Students</a>
                    @endif
                    @if (auth()->user()->can('manage courses') || auth()->user()->can('view available courses'))
                        <a href="{{ route('courses.index') }}" class="{{ $link }} {{ $idle }}">Courses</a>
                    @endif
                    @if (auth()->user()->can('view own registrations'))
                        <a href="{{ route('registrations.mine') }}" class="{{ $link }} {{ $idle }}">My registrations</a>
                    @endif
                    @if (auth()->user()->can('view assigned courses'))
                        <a href="{{ route('courses.students', 1) }}" class="{{ $link }} {{ $idle }}">My courses</a>
                    @endif
                    <p class="text-xs text-slate-500">{{ auth()->user()->name }} ({{ auth()->user()->role }})</p>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full px-5 py-2.5 border border-slate-200 rounded-lg font-medium text-sm">Logout</button>
                    </form>
                @endauth
            </div>
        </div>
    </div>
</header>