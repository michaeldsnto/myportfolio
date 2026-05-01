<section>
    <div class="max-w-5xl">

        {{-- Header --}}
        <p 
            data-aos="fade-up"
            class="text-sm uppercase tracking-[0.2em] text-zinc-500 mb-4"
        >
            Expertise
        </p>

        <h2 
            data-aos="fade-up"
            data-aos-delay="100"
            class="text-4xl font-bold mb-10"
        >
            Tech Stack
        </h2>

        {{-- Skills --}}
        <div class="flex flex-wrap gap-4">

            @foreach($featuredSkills as $index => $skill)
                <div 
                    data-aos="fade-up"
                    data-aos-delay="{{ ($index % 6) * 100 }}"
                    class="px-5 py-3 rounded-full border border-white/10 hover:border-white/20 transition"
                >
                    {{ $skill->name }}
                </div>
            @endforeach

        </div>

    </div>
</section>