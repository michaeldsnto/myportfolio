@extends('layouts.app')

@section('content')

    @include('components.hero')

    <section class="py-28">
        <div class="max-w-7xl mx-auto px-6 md:px-12">

            <div class="grid lg:grid-cols-2 gap-16">

                {{-- LEFT COLUMN --}}
                <div class="space-y-20">

                    @include('components.about')

                    @include('components.skills')

                </div>

                {{-- RIGHT COLUMN --}}
                <div>

                    @include('components.experience')

                </div>

            </div>

        </div>
    </section>

    @include('components.projects')

    @include('components.contact-cta')

    @include('components.resume')

    

@endsection