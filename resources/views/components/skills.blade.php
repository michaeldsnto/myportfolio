<div>

    <p class="text-sm uppercase tracking-[0.2em] text-zinc-500 mb-4">
        Expertise
    </p>

    <h2 class="text-4xl font-bold mb-10">
        Tech Stack
    </h2>

    <div class="flex flex-wrap gap-4">
        @foreach($featuredSkills as $skill)
            <div class="px-5 py-3 rounded-full border border-white/10 hover:border-white/20 transition">
                {{ $skill->name }}
            </div>
        @endforeach
    </div>

</div>