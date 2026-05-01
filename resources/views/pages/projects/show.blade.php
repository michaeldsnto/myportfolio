@extends('layouts.app')

@section('content')

    <section class="pt-40 pb-24">
        <div class="max-w-5xl mx-auto px-6 md:px-12">

            {{-- Header --}}
            <div class="mb-16">

                <p data-aos="fade-up" class="text-sm uppercase tracking-[0.2em] text-zinc-500 mb-4">
                    Case Study
                </p>

                <h1 data-aos="fade-up" data-aos-delay="100" class="text-5xl font-bold mb-6">
                    {{ $project->title }}
                </h1>

                <div class="text-zinc-400 leading-relaxed space-y-4 whitespace-pre-line">
                    {!! $project->full_description !!}
                </div>

            </div>

            {{-- Featured Image --}}
            @if($project->featured_image)
                <div data-aos="zoom-in" class="mb-20 rounded-3xl overflow-hidden border border-white/5">
                    <img src="{{ asset('storage/' . $project->featured_image) }}" alt="{{ $project->title }}" loading="lazy"
                        class="w-full object-cover">
                </div>
            @endif

            {{-- Content Sections --}}
            <div class="space-y-16">

                {{-- Problem --}}
                <div data-aos="fade-up">
                    <h2 class="text-2xl font-semibold mb-4">
                        Problem
                    </h2>

                    <div class="text-zinc-400 leading-relaxed space-y-4 whitespace-pre-line">
                        {!! $project->problem_statement !!}
                    </div>
                </div>

                {{-- Solution --}}
                <div data-aos="fade-up" data-aos-delay="100">
                    <h2 class="text-2xl font-semibold mb-4">
                        Solution
                    </h2>

                    <div class="text-zinc-400 leading-relaxed space-y-4 whitespace-pre-line">
                        {!! $project->solution !!}
                    </div>
                </div>

                <div data-aos="fade-up" data-aos-delay="200">
                    <h2 class="text-2xl font-semibold mb-4">
                        Result
                    </h2>

                    <div class="text-zinc-400 leading-relaxed space-y-4 whitespace-pre-line">
                        {!! $project->result !!}
                    </div>
                </div>

                {{-- Tech Stack --}}
                <div data-aos="fade-up" data-aos-delay="300">
                    <h2 class="text-2xl font-semibold mb-6">
                        Tech Stack
                    </h2>

                    <div class="flex flex-wrap gap-3">
                        @foreach(explode(',', $project->tech_stack) as $tech)
                            <span class="px-4 py-2 text-sm rounded-full border border-white/10 text-zinc-300">
                                {{ trim($tech) }}
                            </span>
                        @endforeach
                    </div>
                </div>

            </div>

            {{-- Links --}}
            <div data-aos="fade-up" data-aos-delay="400" class="mt-20 flex flex-wrap gap-4">

                @if($project->github_url)
                    <a href="{{ $project->github_url }}" target="_blank"
                        class="px-6 py-3 border border-white/10 rounded-full hover:border-white/20 transition">
                        GitHub Repository
                    </a>
                @endif

                @if($project->project_url)
                    <a href="{{ $project->project_url }}" target="_blank"
                        class="px-6 py-3 bg-white text-black rounded-full hover:opacity-90 transition">
                        Live Demo
                    </a>
                @endif

            </div>

            <div data-aos="fade-up" data-aos-delay="500" class="mt-24 text-center">
                <h3 class="text-2xl font-semibold mb-4">
                    Interested in similar work?
                </h3>

                <p class="text-zinc-400 mb-6">
                    I'm available for freelance and full-time opportunities.
                </p>

                <a href="{{ route('home') }}#contact"
                    class="px-8 py-4 bg-white text-black rounded-full font-medium hover:opacity-90 transition">
                    Contact Me
                </a>
            </div>

        </div>
    </section>

@endsection