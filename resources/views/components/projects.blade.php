<section id="projects" class="py-28">
    <div class="mx-auto max-w-7xl px-6 md:px-12">
        <div class="mb-16 text-center">
            <p data-aos="fade-up" class="mb-4 text-sm uppercase tracking-[0.2em] text-zinc-500">
                Portfolio
            </p>

            <h2 data-aos="fade-up" data-aos-delay="100" class="mb-6 text-4xl font-bold md:text-5xl">
                Selected Projects
            </h2>

            <p data-aos="fade-up" data-aos-delay="200" class="mx-auto max-w-2xl text-zinc-400">
                Featured Laravel work built to solve real business problems with clear scope, clean delivery, and
                production-minded implementation.
            </p>
        </div>

        <div class="grid gap-8 md:grid-cols-2">
            @foreach($featuredProjects as $index => $project)
                <article
                    data-aos="fade-up"
                    data-aos-delay="{{ $index * 100 }}"
                    class="overflow-hidden rounded-2xl border border-white/5 transition hover:border-white/10"
                >
                    @if($project->featured_image)
                        <div class="h-52 overflow-hidden">
                            <img
                                src="{{ asset('storage/' . $project->featured_image) }}"
                                alt="{{ $project->title }}"
                                class="h-full w-full object-cover transition duration-500 hover:scale-105"
                            >
                        </div>
                    @endif

                    <div class="p-6">
                        <h3 class="mb-3 text-xl font-semibold">
                            {{ $project->title }}
                        </h3>

                        <p class="mb-6 text-zinc-400">
                            {{ \Illuminate\Support\Str::limit($project->short_description, 120) }}
                        </p>

                        <a href="{{ route('projects.show', $project->slug) }}"
                           class="text-sm font-medium transition hover:text-zinc-300">
                            View Case Study ->
                        </a>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="mt-16 text-center">
            <a href="{{ route('projects.index') }}"
               data-aos="fade-up"
               data-aos-delay="200"
               class="rounded-full border border-white/10 px-6 py-3 text-sm transition hover:border-white/20">
                View All Projects
            </a>
        </div>
    </div>
</section>
