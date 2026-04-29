@extends('layouts.app')

@section('content')

<section class="pt-40 pb-24">
    <div class="max-w-5xl mx-auto px-6 md:px-12">

        <p class="text-sm uppercase tracking-[0.2em] text-zinc-500 mb-4">
            Case Study
        </p>

        <h1 class="text-5xl font-bold mb-6">
            {{ $project->title }}
        </h1>

        <p class="text-zinc-400 text-lg leading-relaxed mb-12">
            {{ $project->full_description }}
        </p>

        {{-- Featured Image --}}
        @if($project->featured_image)
            <div class="mb-16 rounded-3xl overflow-hidden border border-white/5">
                <img
                    src="{{ asset('storage/' . $project->featured_image) }}"
                    alt="{{ $project->title }}"
                    class="w-full object-cover"
                >
            </div>
        @endif

        {{-- Problem --}}
        <div class="mb-14">
            <h2 class="text-2xl font-semibold mb-4">
                Problem
            </h2>

            <p class="text-zinc-400 leading-relaxed">
                {{ $project->problem_statement }}
            </p>
        </div>

        {{-- Solution --}}
        <div class="mb-14">
            <h2 class="text-2xl font-semibold mb-4">
                Solution
            </h2>

            <p class="text-zinc-400 leading-relaxed">
                {{ $project->solution }}
            </p>
        </div>

        {{-- Result --}}
        <div class="mb-14">
            <h2 class="text-2xl font-semibold mb-4">
                Result
            </h2>

            <p class="text-zinc-400 leading-relaxed">
                {{ $project->result }}
            </p>
        </div>

        {{-- Tech Stack --}}
        <div class="mb-14">
            <h2 class="text-2xl font-semibold mb-4">
                Tech Stack
            </h2>

            <p class="text-zinc-400">
                {{ $project->tech_stack }}
            </p>
        </div>

        {{-- Links --}}
        <div class="flex flex-wrap gap-4">

            @if($project->github_url)
                <a href="{{ $project->github_url }}"
                   target="_blank"
                   class="px-6 py-3 border border-white/10 rounded-full">
                    GitHub Repository
                </a>
            @endif

            @if($project->project_url)
                <a href="{{ $project->project_url }}"
                   target="_blank"
                   class="px-6 py-3 bg-white text-black rounded-full">
                    Live Demo
                </a>
            @endif

        </div>

    </div>
</section>

@endsection