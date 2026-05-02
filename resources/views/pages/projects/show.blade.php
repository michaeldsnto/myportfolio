@extends('layouts.app')

@section('meta_title', $project->title . ' | ' . ($siteSetting->site_title ?: 'Laravel Developer Portfolio'))
@section('meta_description', \Illuminate\Support\Str::limit(strip_tags($project->short_description ?: $project->full_description), 160))
@section('canonical_url', route('projects.show', $project->slug))
@section('og_image', $project->featured_image ? asset('storage/' . $project->featured_image) : $seoSetting->og_image_url)

@section('content')
<section class="pt-40 pb-24">
    <div class="mx-auto max-w-5xl px-6 md:px-12">
        <div class="mb-16">
            <p data-aos="fade-up" class="mb-4 text-sm uppercase tracking-[0.2em] text-zinc-500">
                Case Study
            </p>

            <h1 data-aos="fade-up" data-aos-delay="100" class="mb-6 text-5xl font-bold">
                {{ $project->title }}
            </h1>

            <div class="space-y-4 whitespace-pre-line leading-relaxed text-zinc-400">
                {!! $project->full_description !!}
            </div>
        </div>

        @if($project->featured_image)
            <div data-aos="zoom-in" class="mb-20 overflow-hidden rounded-3xl border border-white/5">
                <img
                    src="{{ asset('storage/' . $project->featured_image) }}"
                    alt="{{ $project->title }}"
                    loading="lazy"
                    class="w-full object-cover"
                >
            </div>
        @endif

        <div class="space-y-16">
            @if($project->problem_statement)
                <div data-aos="fade-up">
                    <h2 class="mb-4 text-2xl font-semibold">Problem</h2>
                    <div class="space-y-4 whitespace-pre-line leading-relaxed text-zinc-400">
                        {!! $project->problem_statement !!}
                    </div>
                </div>
            @endif

            @if($project->solution)
                <div data-aos="fade-up" data-aos-delay="100">
                    <h2 class="mb-4 text-2xl font-semibold">Solution</h2>
                    <div class="space-y-4 whitespace-pre-line leading-relaxed text-zinc-400">
                        {!! $project->solution !!}
                    </div>
                </div>
            @endif

            @if($project->result)
                <div data-aos="fade-up" data-aos-delay="200">
                    <h2 class="mb-4 text-2xl font-semibold">Result</h2>
                    <div class="space-y-4 whitespace-pre-line leading-relaxed text-zinc-400">
                        {!! $project->result !!}
                    </div>
                </div>
            @endif

            @if($project->tech_stack)
                <div data-aos="fade-up" data-aos-delay="300">
                    <h2 class="mb-6 text-2xl font-semibold">Tech Stack</h2>
                    <div class="flex flex-wrap gap-3">
                        @foreach(array_filter(array_map('trim', explode(',', $project->tech_stack))) as $tech)
                            <span class="rounded-full border border-white/10 px-4 py-2 text-sm text-zinc-300">
                                {{ $tech }}
                            </span>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>

        <div data-aos="fade-up" data-aos-delay="400" class="mt-20 flex flex-wrap gap-4">
            @if($project->github_url)
                <a href="{{ $project->github_url }}" target="_blank" rel="noreferrer"
                   class="rounded-full border border-white/10 px-6 py-3 transition hover:border-white/20">
                    GitHub Repository
                </a>
            @endif

            @if($project->project_url)
                <a href="{{ $project->project_url }}" target="_blank" rel="noreferrer"
                   class="rounded-full bg-white px-6 py-3 text-black transition hover:opacity-90">
                    Live Demo
                </a>
            @endif
        </div>

        <div data-aos="fade-up" data-aos-delay="500" class="mt-24 text-center">
            <h3 class="mb-4 text-2xl font-semibold">
                Interested in similar work?
            </h3>

            <p class="mb-6 text-zinc-400">
                I'm available for freelance and full-time opportunities.
            </p>

            <a href="{{ route('home') }}#contact"
               class="rounded-full bg-white px-8 py-4 font-medium text-black transition hover:opacity-90">
                Contact Me
            </a>
        </div>
    </div>
</section>
@endsection
