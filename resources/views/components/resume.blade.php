<section class="py-28">
    <div class="max-w-4xl mx-auto px-6 text-center">

        {{-- Heading --}}
        <h2 
            data-aos="fade-up"
            class="text-4xl font-bold mb-6"
        >
            Want the full background?
        </h2>

        {{-- Description --}}
        <p 
            data-aos="fade-up"
            data-aos-delay="100"
            class="text-zinc-400 mb-8"
        >
            Download my latest resume for a complete overview
            of projects, experience, and technical expertise.
        </p>

        {{-- CTA --}}
        @if($activeResume)
            <a 
                data-aos="fade-up"
                data-aos-delay="200"
                href="{{ $activeResume->file_url }}"
                target="_blank"
                download
                class="px-8 py-4 bg-white text-black rounded-full font-medium hover:opacity-90 transition"
            >
                Download Resume
            </a>
        @else
            <p 
                data-aos="fade-up"
                data-aos-delay="200"
                class="text-zinc-500"
            >
                Resume is currently unavailable.
            </p>
        @endif

    </div>
</section>