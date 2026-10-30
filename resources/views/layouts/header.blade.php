<header class="fixed top-0 left-0 right-0 z-50 bg-white/95 backdrop-blur border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <a href="{{ route('index') }}" class="flex items-center gap-3">
                <img src="{{ asset('assets/img/logo.png') }}" alt="MUBS" class="h-11 w-11">
                <div class="hidden sm:block">
                    <p class="text-sm font-semibold text-slate-900 leading-tight">Student Management System</p>
                    <p class="text-[11px] text-slate-500">Makerere University Business School</p>
                </div>
            </a>
            <div class="hidden md:flex items-center gap-8">
                <a href="{{ route('index') }}" class="text-slate-900 transition-colors text-sm font-medium">Home</a>
                <a href="{{ route('index') }}#features" class="text-slate-500 hover:text-slate-900 transition-colors text-sm font-medium">Features</a>
                <a href="{{ route('index') }}#portals" class="text-slate-500 hover:text-slate-900 transition-colors text-sm font-medium">Portals</a>
                <a href="{{ route('contact') }}" class="text-slate-500 hover:text-slate-900 transition-colors text-sm font-medium">Contact</a>
                <a href="{{ route('contactlist') }}" class="text-slate-500 hover:text-slate-900 transition-colors text-sm font-medium">Contact list</a>
                <a href="{{ route('login') }}" class="px-5 py-2.5 border border-slate-200 text-slate-900 rounded-lg font-medium text-sm hover:border-[#2563eb]/40">Sign in</a>
                <a href="{{ route('register') }}" class="px-5 py-2.5 bg-[#2563eb] text-white rounded-lg font-medium text-sm hover:bg-[#1d4ed8] glow-blue">Apply / Register</a>
            </div>
            <button type="button" data-mobile-nav class="md:hidden p-2 text-slate-900"><i data-lucide="menu" class="w-6 h-6"></i></button>
        </div>
        <div id="mobile-nav" class="hidden md:hidden py-4 border-t border-slate-200">
            <div class="flex flex-col gap-4">
                <a href="{{ route('index') }}" class="text-slate-900 transition-colors text-sm font-medium">Home</a>
                <a href="{{ route('index') }}#features" class="text-slate-500 hover:text-slate-900 transition-colors text-sm font-medium">Features</a>
                <a href="{{ route('index') }}#portals" class="text-slate-500 hover:text-slate-900 transition-colors text-sm font-medium">Portals</a>
                <a href="{{ route('contact') }}" class="text-slate-500 hover:text-slate-900 transition-colors text-sm font-medium">Contact</a>
                <a href="{{ route('contactlist') }}" class="text-slate-500 hover:text-slate-900 transition-colors text-sm font-medium">Contact list</a>
                <a href="{{ route('login') }}" class="px-5 py-2.5 border border-slate-200 rounded-lg font-medium text-sm text-center">Sign in</a>
                <a href="{{ route('register') }}" class="px-5 py-2.5 bg-[#2563eb] text-white rounded-lg font-medium text-sm text-center">Apply / Register</a>
            </div>
        </div>
    </div>
</header>