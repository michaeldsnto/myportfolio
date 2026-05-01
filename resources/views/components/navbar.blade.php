<header class="fixed top-0 left-0 w-full z-50 bg-zinc-950/80 backdrop-blur-md border-b border-white/5">
    <div class="max-w-7xl mx-auto px-6 md:px-12">

        <div class="h-20 flex items-center justify-between">

            {{-- Logo --}}
            <a href="{{ route('home') }}"
               class="text-xl font-bold tracking-tight">
                M<span class="text-zinc-500">.</span>Dev
            </a>

            {{-- Desktop Navigation --}}
            <nav class="hidden md:flex items-center gap-8">

                <a href="{{ route('home') }}#about"
                   class="text-sm text-zinc-400 hover:text-white">
                    About
                </a>

                <a href="{{ route('home') }}#projects"
                   class="text-sm text-zinc-400 hover:text-white ">
                    Projects
                </a>

                <a href="{{ route('home') }}#contact"
                   class="text-sm text-zinc-400 hover:text-white ">
                    Contact
                </a>

                <a href="{{ route('home') }}#contact"
                   class="px-5 py-2 rounded-full bg-white text-black text-sm font-medium hover:opacity-90 ">
                    Hire Me
                </a>

            </nav>

        </div>
    </div>
</header>