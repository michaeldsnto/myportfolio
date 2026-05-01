<section id="projects" class="py-28">

    <div class="max-w-7xl mx-auto px-6 md:px-12">

        {{-- Header --}}
        <div class="mb-16 text-center">

            <p data-aos="fade-up"
               class="text-sm uppercase tracking-[0.2em] text-zinc-500 mb-4">
                Portfolio
            </p>

            <h2 data-aos="fade-up" data-aos-delay="100"
                class="text-4xl md:text-5xl font-bold mb-6">
                Selected Projects
            </h2>

            <p data-aos="fade-up" data-aos-delay="200"
               class="text-zinc-400 max-w-2xl mx-auto">
                Collection of Featured projects for the real problems using laravel
            </p>

        </div>

        {{-- Grid --}}
        <div class="grid md:grid-cols-2 lg:grid-cols-2 gap-8">

            @foreach($featuredProjects as $index => $project)
                <article
                    data-aos="fade-up"
                    data-aos-delay="{{ $index * 100 }}"
                    class="border border-white/5 rounded-2xl overflow-hidden hover:border-white/10 transition"
                >

                    {{-- Image --}}
                    @if($project->featured_image)
                        <div class="h-52 overflow-hidden">
                            <img
                                src="{{ asset('storage/' . $project->featured_image) }}"
                                alt="{{ $project->title }}"
                                class="w-full h-full object-cover hover:scale-105 transition duration-500"
                            >
                        </div>
                    @endif

                    <div class="p-6">

                        {{-- Title --}}
                        <h3 class="text-xl font-semibold mb-3">
                            {{ $project->title }}
                        </h3>

                        {{-- Description --}}
                        <p class="text-zinc-400 mb-6">
                            {{ \Illuminate\Support\Str::limit($project->short_description, 120) }}
                        </p>

                        {{-- CTA --}}
                        <a href="{{ route('projects.show', $project->slug) }}"
                           class="text-sm font-medium hover:text-zinc-300 transition">
                            View Case Study →
                        </a>

                    </div>

                </article>
            @endforeach

        </div>

        {{-- View All --}}
        <div class="text-center mt-16">
            <a href="{{ route('projects.index') }}"
               data-aos="fade-up"
               data-aos-delay="200"
               class="px-6 py-3 border border-white/10 rounded-full text-sm hover:border-white/20 transition">
                View All Projects
            </a>
        </div>

    </div>

</section>