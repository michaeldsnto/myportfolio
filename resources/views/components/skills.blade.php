<section class="py-28 border-t border-white/5">
    <div class="max-w-6xl mx-auto px-6 md:px-12">

        <p class="text-sm uppercase tracking-[0.2em] text-zinc-500 mb-4">
            Expertise
        </p>

        <h2 class="text-4xl font-bold mb-12">
            Tech Stack
        </h2>

        <div class="flex flex-wrap gap-4">
            @foreach($featuredSkills as $skill)
                <div class="px-5 py-3 rounded-full border border-white/10">
                    {{ $skill->name }}
                </div>
            @endforeach
        </div>

    </div>
</section>