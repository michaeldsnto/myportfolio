@extends('layouts.app')

@section('meta_title', 'Projects | ' . ($siteSetting->site_title ?: 'Laravel Developer Portfolio'))
@section('meta_description', 'Browse selected Laravel projects, case studies, and production-focused portfolio work.')

@section('content')
<section class="pt-40 pb-24">
    <div class="mx-auto max-w-7xl px-6 md:px-12">
        <div class="mb-16">
            <p data-aos="fade-up" class="mb-4 text-sm uppercase tracking-[0.2em] text-zinc-500">
                Portfolio
            </p>

            <h1 data-aos="fade-up" data-aos-delay="100" class="mb-6 text-5xl font-bold md:text-6xl">
                All Projects
            </h1>

            <p data-aos="fade-up" data-aos-delay="200" class="max-w-3xl text-lg leading-relaxed text-zinc-400">
                A collection of business-focused Laravel applications, admin systems, and production-ready
                solutions built with clean architecture and long-term maintainability in mind.
            </p>
        </div>

        @if($projects->count())
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach($projects as $index => $project)
                    <article
                        data-aos="fade-up"
                        data-aos-delay="{{ $index * 100 }}"
                        class="group overflow-hidden rounded-2xl border border-white/5 transition hover:border-white/10"
                    >
                        <div class="h-52 overflow-hidden bg-zinc-800">
                            @if($project->featured_image)
                                <img
                                    src="{{ asset('storage/' . $project->featured_image) }}"
                                    alt="{{ $project->title }}"
                                    loading="lazy"
                                    class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                                >
                            @else
                                <div class="flex h-full w-full items-center justify-center text-sm text-zinc-500">
                                    No Image
                                </div>
                            @endif
                        </div>

                        <div class="p-6">
                            @if($project->is_featured)
                                <span class="mb-4 inline-block rounded-full border border-white/10 px-3 py-1 text-xs text-zinc-400">
                                    Featured Project
                                </span>
                            @endif

                            <h2 class="mb-3 text-2xl font-semibold">
                                {{ $project->title }}
                            </h2>

                            <p class="mb-6 leading-relaxed text-zinc-400">
                                {{ \Illuminate\Support\Str::limit($project->short_description, 140) }}
                            </p>

                            <div class="flex items-center justify-between gap-4">
                                <a href="{{ route('projects.show', $project->slug) }}"
                                   class="text-sm font-medium transition hover:text-white">
                                    View Case Study ->
                                </a>

                                <span class="text-xs text-zinc-500">
                                    {{ optional($project->published_at)->format('M Y') }}
                                </span>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <div data-aos="fade-up" data-aos-delay="200" class="mt-16">
                {{ $projects->links() }}
            </div>
        @else
            <div class="py-24 text-center">
                <h2 class="mb-4 text-2xl font-semibold">
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
