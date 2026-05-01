@extends('layouts.app')

@section('content')

<section class="pt-40 pb-24">
    <div class="max-w-7xl mx-auto px-6 md:px-12">

        {{-- Header --}}
        <div class="mb-16">
            <p 
                data-aos="fade-up"
                class="text-sm uppercase tracking-[0.2em] text-zinc-500 mb-4"
            >
                Portfolio
            </p>

            <h1 
                data-aos="fade-up"
                data-aos-delay="100"
                class="text-5xl md:text-6xl font-bold mb-6"
            >
                All Projects
            </h1>

            <p 
                data-aos="fade-up"
                data-aos-delay="200"
                class="text-zinc-400 text-lg max-w-3xl leading-relaxed"
            >
                A collection of business-focused Laravel applications,
                admin systems, and production-ready solutions built
                with clean architecture and long-term maintainability in mind.
            </p>
        </div>

        {{-- Projects Grid --}}
        @if($projects->count())
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

                @foreach($projects as $index => $project)
                    <article 
                        data-aos="fade-up"
                        data-aos-delay="{{ $index * 100 }}"
                        class="group border border-white/5 rounded-2xl overflow-hidden hover:border-white/10 transition"
                    >

                        {{-- Image --}}
                        <div class="h-52 overflow-hidden bg-zinc-800">
                            @if($project->featured_image)
                                <img
                                    src="{{ asset('storage/' . $project->featured_image) }}"
                                    alt="{{ $project->title }}"
                                    loading="lazy"
                                    class="w-full h-full object-cover group-hover:scale-105 transition duration-500"
                                >
                            @else
                                <div class="w-full h-full flex items-center justify-center text-zinc-500 text-sm">
                                    No Image
                                </div>
                            @endif
                        </div>

                        <div class="p-6">

                            {{-- Badge --}}
                            @if($project->is_featured)
                                <span class="inline-block text-xs px-3 py-1 rounded-full border border-white/10 text-zinc-400 mb-4">
                                    Featured Project
                                </span>
                            @endif

                            {{-- Title --}}
                            <h2 class="text-2xl font-semibold mb-3">
                                {{ $project->title }}
                            </h2>

                            {{-- Description --}}
                            <p class="text-zinc-400 leading-relaxed mb-6">
                                {{ \Illuminate\Support\Str::limit($project->short_description, 140) }}
                            </p>

                            {{-- Footer --}}
                            <div class="flex items-center justify-between">

                                <a href="{{ route('projects.show', $project->slug) }}"
                                   class="text-sm font-medium hover:text-white transition">
                                    View Case Study →
                                </a>

                                <span class="text-xs text-zinc-500">
                                    {{ optional($project->published_at)->format('M Y') }}
                                </span>

                            </div>
                        </div>

                    </article>
                @endforeach

            </div>

            {{-- Pagination --}}
            <div 
                data-aos="fade-up"
                data-aos-delay="200"
                class="mt-16"
            >
                {{ $projects->links() }}
            </div>

        @else
            {{-- Empty State --}}
            <div class="py-24 text-center">
                <h2 class="text-2xl font-semibold mb-4">
                    No projects available yet
                </h2>

                <p class="text-zinc-500">
                    Projects will appear here once published.
                </p>
            </div>
        @endif

    </div>
</section>

@endsection