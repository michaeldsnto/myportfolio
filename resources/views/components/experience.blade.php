<section id="experience" class="py-28">
    <div class="max-w-5xl mx-auto px-6 md:px-12">

        <p class="text-sm uppercase tracking-[0.2em] text-zinc-500 mb-4">
            Experience
        </p>

        <h2 class="text-4xl font-bold mb-12">
            Professional Journey
        </h2>

        <div class="space-y-10">
            @foreach($experiences as $experience)
                <div class="border-l border-white/10 pl-8">

                    <h3 class="text-xl font-semibold">
                        {{ $experience->title }}
                    </h3>

                    <p class="text-zinc-400">
                        {{ $experience->company_name }}
                    </p>

                    <p class="text-sm text-zinc-500 mt-2">
                        {{ $experience->start_date }} — 
                        {{ $experience->is_current ? 'Present' : $experience->end_date }}
                    </p>

                </div>
            @endforeach
        </div>

    </div>
</section>