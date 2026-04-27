<section id="projects" class="py-28 border-t border-white/5">
    <div class="max-w-7xl mx-auto px-6 md:px-12">

        <div class="flex items-center justify-between mb-12">
            <div>
                <p class="text-sm uppercase tracking-[0.2em] text-zinc-500">
                    Featured Projects
                </p>

                <h2 class="text-4xl font-bold mt-2">
                    Selected Work
                </h2>
            </div>

            <a href="{{ route('projects.index') }}"
               class="text-sm text-zinc-400 hover:text-white">
                View All →
            </a>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($featuredProjects as $project)
                <div class="border border-white/5 rounded-2xl p-6">

                    <h3 class="text-xl font-semibold mb-3">
                        {{ $project->title }}
                    </h3>

                    <p class="text-zinc-400 mb-4">
                        {{ $project->short_description }}
                    </p>

                    <a href="{{ route('projects.show', $project->slug) }}"
                       class="text-sm font-medium">
                        View Case Study →
                    </a>

                </div>
            @endforeach
        </div>

    </div>
</section>