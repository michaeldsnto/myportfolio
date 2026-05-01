<section class="py-28">
    <div id="experience" class="scroll-mt-32 max-w-4xl">

        {{-- Header --}}
        <p 
            data-aos="fade-up"
            class="text-sm uppercase tracking-[0.2em] text-zinc-500 mb-4"
        >
            Experience
        </p>

        <h2 
            data-aos="fade-up"
            data-aos-delay="100"
            class="text-4xl font-bold mb-12"
        >
            Professional Journey
        </h2>

        {{-- Timeline --}}
        <div class="space-y-10">
            @foreach($experiences as $index => $experience)
                <div 
                    data-aos="fade-up"
                    data-aos-delay="{{ $index * 100 }}"
                    class="border-l border-white/10 pl-8 pb-8"
                >

                    <h3 class="text-xl font-semibold">
                        {{ $experience->title }}
                    </h3>

                    <p class="text-zinc-400">
                        {{ $experience->company_name }}
                    </p>

                    <p class="text-sm text-zinc-500 mt-2 mb-4">
                        {{ $experience->duration }}
                    </p>

                </div>
            @endforeach
        </div>

    </div>
</section>