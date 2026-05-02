<footer class="py-10 border-t border-white/5">
    <div class="mx-auto flex max-w-7xl flex-col gap-3 px-6 text-sm text-zinc-500 md:flex-row md:items-center md:justify-between md:px-12">
        <p>&copy; {{ date('Y') }} {{ $siteSetting->site_name ?: 'My Portfolio' }}</p>
        <p>Built with Laravel + Filament</p>
    </div>
</footer>
