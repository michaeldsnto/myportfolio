<section id="contact" class="py-28">
    <div class="max-w-7xl mx-auto px-6 md:px-12">

        {{-- Header --}}
        <div class="text-center mb-14">
            <p data-aos="fade-up" class="text-sm uppercase tracking-[0.2em] text-zinc-500 mb-3">
                Contact
            </p>

            <h2 data-aos="fade-up" data-aos-delay="100" class="text-4xl font-bold">
                Let's Build Something Great
            </h2>
        </div>

        <div class="grid md:grid-cols-2 gap-8 items-stretch">

            {{-- LEFT: CONTACT INFO --}}
            <div data-aos="fade-right"
                class="border border-white/5 rounded-3xl p-8 h-full flex flex-col justify-between">

                <div>
                    <h3 class="text-2xl font-semibold mb-6">
                        Contact Info
                    </h3>

                    <p class="text-zinc-400 mb-8 leading-relaxed">
                        I'm available for freelance work, full-time opportunities,
                        and backend Laravel projects that require clean architecture
                        and scalable solutions.
                    </p>
                </div>

                <div class="space-y-8">

                    <div>
                        <p class="text-sm text-zinc-500">Email</p>
                        <p class="font-medium">{{ $siteSetting->contact_email }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-zinc-500">Location</p>
                        <p class="font-medium">{{ $siteSetting->location }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-zinc-500">Phone</p>
                        <p class="font-medium">{{ $siteSetting->contact_phone }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-zinc-500">Availability</p>
                        <p class="font-medium text-green-400">
                            Open for Opportunities
                        </p>
                    </div>

                </div>

            </div>

            {{-- RIGHT: FORM --}}
            <div data-aos="fade-left" data-aos-delay="100"
                class="border border-white/5 rounded-3xl p-8 h-full flex flex-col">

                <h3 class="text-2xl font-semibold mb-6">
                    Send Me a Message
                </h3>
                

                @if(session('success'))
                    <div class="mb-6 p-4 rounded-xl bg-green-500/10 border border-green-500/20 text-green-400">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('contact.store') }}" class="space-y-5 flex-1 flex flex-col">

                    @csrf

                    <input type="text" name="name" placeholder="Your Name" required
                        class="w-full bg-transparent border border-white/10 rounded-xl px-4 py-4 focus:outline-none focus:border-white">

                    <input type="email" name="email" placeholder="Your Email" required
                        class="w-full bg-transparent border border-white/10 rounded-xl px-4 py-4 focus:outline-none focus:border-white">

                    <textarea name="message" rows="5" placeholder="Your Message" required
                        class="w-full bg-transparent border border-white/10 rounded-xl px-4 py-4 focus:outline-none focus:border-white flex-1"></textarea>

                    <button type="submit"
                        class="w-full bg-white text-black py-4 rounded-xl font-medium hover:opacity-90 transition">
                        Send Message
                    </button>

                </form>

            </div>

        </div>

    </div>
</section>