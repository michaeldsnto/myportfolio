<section id="projects" class="py-28">
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
               class="text-sm text-zinc-400 hover:text-white transition">
                View All →
            </a>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

            @foreach($featuredProjects as $project)
                <div
                    class="rounded-3xl border border-white/5 overflow-hidden bg-white/[0.02] hover:border-white/10 transition duration-300"
                    data-aos="fade-up"
                    data-aos-delay="{{ $loop->index * 100 }}"
                >

                    {{-- Project Image --}}
                    <div class="aspect-[16/10] overflow-hidden">
                        <img
                            src="{{ asset('storage/' . $project->featured_image) }}"
                            alt="{{ $project->title }}"
                            class="w-full h-full object-cover hover:scale-105 transition duration-500"
                            loading="lazy"
                        >
                    </div>

                    {{-- Content --}}
                    <div class="p-6">

                        {{-- Title --}}
                        <h3 class="text-xl font-semibold mb-3">
                            {{ $project->title }}
                        </h3>

                        {{-- Short Description --}}
                        <p class="text-zinc-400 text-sm leading-relaxed mb-5">
                            {{ $project->short_description }}
                        </p>

                        {{-- Tech Stack --}}
                        <div class="flex flex-wrap gap-2 mb-6">
                            @foreach(explode(',', $project->tech_stack) as $tech)
                                <span class="px-3 py-1 text-xs rounded-full border border-white/10 text-zinc-300">
                                    {{ trim($tech) }}
                                </span>
                            @endforeach
                        </div>

                        {{-- Actions --}}
                        <div class="flex items-center gap-4 text-sm font-medium">

                            <a href="{{ route('projects.show', $project->slug) }}"
                               class="hover:text-zinc-300 transition">
                                View Case Study
                            </a>

                            @if($project->github_url)
                                <a href="{{ $project->github_url }}"
                                   target="_blank"
                                   class="text-zinc-400 hover:text-white transition">
                                    GitHub
                                </a>
                            @endif

                            @if($project->project_url)
                                <a href="{{ $project->project_url }}"
                                   target="_blank"
                                   class="text-zinc-400 hover:text-white transition">
                                    Live Demo
                                </a>
                            @endif

                        </div>

                    </div>

                </div>
            @endforeach

        </div>

    </div>
</section>