<form method="POST" action="{{ route('contact.store') }}">
    @csrf

    {{-- Honeypot --}}
    <div class="hidden">
        <input
            type="text"
            name="website"
            tabindex="-1"
            autocomplete="off"
        >
    </div>

    <input
        type="text"
        name="name"
        value="{{ old('name') }}"
        required
    >

    <input
        type="email"
        name="email"
        value="{{ old('email') }}"
        required
    >

    <input
        type="text"
        name="subject"
        value="{{ old('subject') }}"
        required
    >

    <textarea
        name="message"
        required
    >{{ old('message') }}</textarea>

    <button type="submit">
        Send Message
    </button>
</form>