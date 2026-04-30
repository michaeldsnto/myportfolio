<section class="min-h-screen flex items-center pt-24" data-aos="fade-up">
    <div class="max-w-7xl mx-auto px-6 md:px-12 w-full">

        <div class="grid md:grid-cols-2 gap-12 items-center">

            <div>
                <p class="text-sm uppercase tracking-[0.2em] text-zinc-400 mb-4">
                    {{$siteSetting->hero_subtitle}}
                </p>

                <h1 class="text-5xl md:text-7xl font-bold leading-tight mb-6">
                    Building clean systems,
                    <span class="text-zinc-400">
                        not just websites.
                    </span>
                </h1>

                <p class="text-zinc-400 text-lg leading-relaxed max-w-xl mb-8">
                    {{$siteSetting->hero_description}}
                </p>

                <div class="flex flex-wrap gap-4">
                    <a href="#projects"
                       class="px-8 py-4 bg-white text-black rounded-full font-medium hover:opacity-90 transition">
                        View Projects
                    </a>

                    <a href="#contact"
                       class="px-8 py-4 border border-zinc-700 rounded-full font-medium hover:border-white transition">
                        Hire Me
                    </a>
                </div>
            </div>

            <div class="flex justify-center">
                <div class="w-[380px] h-[480px] rounded-3xl overflow-hidden border border-white/10">
                    <img
                        src="{{ $siteSetting->getProfilePhotoUrlAttribute() }}"
                        alt="Profile"
                        class="w-full h-full object-cover"
                    >
                </div>
            </div>

        </div>
    </div>
</section>