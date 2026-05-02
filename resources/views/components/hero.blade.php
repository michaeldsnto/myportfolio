<section class="min-h-screen flex items-center pt-24">
    <div class="max-w-7xl mx-auto px-6 md:px-12 w-full">

        <div class="grid md:grid-cols-2 gap-12 items-center">

            {{-- LEFT CONTENT --}}
            <div>

                {{-- Subtitle --}}
                <p 
                    data-aos="fade-up"
                    class="text-sm uppercase tracking-[0.2em] text-zinc-400 mb-4"
                >
                    {{ $siteSetting->hero_subtitle }}
                </p>

                {{-- Title --}}
                <h1 
                    data-aos="fade-up"
                    data-aos-delay="100"
                    class="text-5xl md:text-7xl font-bold leading-tight mb-6"
                >
                    {{ $siteSetting->hero_title ?: 'Building clean systems, not just websites.' }}
                </h1>

                {{-- Description --}}
                <p 
                    data-aos="fade-up"
                    data-aos-delay="200"
                    class="text-zinc-400 text-lg leading-relaxed max-w-xl mb-8"
                >
                    {{ $siteSetting->hero_description }}
                </p>

                {{-- CTA --}}
                <div 
                    data-aos="fade-up"
                    data-aos-delay="300"
                    class="flex flex-wrap gap-4"
                >
                    <a href="#projects"
                       class="px-8 py-4 bg-white text-black rounded-full font-medium hover:opacity-90">
                        View Projects
                    </a>

                    <a href="#contact"
                       class="px-8 py-4 border border-zinc-700 rounded-full font-medium hover:border-white">
                        Hire Me
                    </a>
                </div>

            </div>

            {{-- RIGHT IMAGE --}}
            <div 
                data-aos="fade-left"
                data-aos-delay="200"
                class="flex justify-center"
            >
                <div class="w-[380px] h-[480px] rounded-3xl overflow-hidden border border-white/10">
                    <img
                        src="{{ $siteSetting->profile_photo_url }}"
                        alt="Profile"
                        class="w-full h-full object-cover"
                    >
                </div>
            </div>

        </div>
    </div>
</section>
