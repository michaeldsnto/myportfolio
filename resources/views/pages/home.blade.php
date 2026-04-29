@extends('layouts.app')

@section('content')

    <div class="reveal reveal-delay-1">
        @include('components.hero')
    </div>

    <section class="py-28">
        <div class="max-w-7xl mx-auto px-6 md:px-12">

            <div class="grid lg:grid-cols-2 gap-16">

                {{-- LEFT COLUMN --}}
                <div class="space-y-20">

                    <div class="reveal reveal-delay-2">
                        @include('components.about')
                    </div>

                    <div class="reveal reveal-delay-3">
                        @include('components.skills')
                    </div>

                </div>

                {{-- RIGHT COLUMN --}}
                <div class="reveal reveal-delay-4">
                    @include('components.experience')
                </div>

            </div>

        </div>
    </section>

    <div class="reveal reveal-delay-2">
        @include('components.projects')
    </div>

    <div class="reveal reveal-delay-3">
        @include('components.contact-cta')
    </div>

    <div class="reveal reveal-delay-4">
        @include('components.resume')
    </div>

@endsection