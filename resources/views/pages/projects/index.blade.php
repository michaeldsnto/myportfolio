@extends('layouts.app')

@section('content')

<section class="pt-40 pb-24">
    <div class="max-w-7xl mx-auto px-6 md:px-12">

        {{-- Header --}}
        <div class="mb-16">
            <p class="text-sm uppercase tracking-[0.2em] text-zinc-500 mb-4">
                Portfolio
            </p>

            <h1 class="text-5xl md:text-6xl font-bold mb-6">
                All Projects
            </h1>

            <p class="text-zinc-400 text-lg max-w-3xl leading-relaxed">
                A collection of business-focused Laravel applications,
                admin systems, and production-ready solutions built
                with clean architecture and long-term maintainability in mind.
            </p>
        </div>

        {{-- Projects Grid --}}
        @if($projects->count())
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

                @foreach($projects as $project)
                    <article class="border border-white/5 rounded-2xl overflow-hidden hover:border-white/10 transition">

                        {{-- Featured Image --}}
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

                            {{-- Featured Badge --}}
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
                                {{ Str::limit($project->short_description, 140) }}
                            </p>

                            {{-- Footer --}}
                            <div class="flex items-center justify-between">

                                <a href="{{ route('projects.show', $project->slug) }}"
                                   class="text-sm font-medium hover:text-zinc-300 transition">
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
            <div class="mt-16">
                {{ $projects->links() }}
            </div>

        @else
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