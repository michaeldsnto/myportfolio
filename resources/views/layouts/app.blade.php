<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $siteSetting->site_title ?? 'DevPortfolio Pro' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <meta name="description" content="Professional Laravel Developer Portfolio">
</head>
<body class="bg-zinc-950 text-white antialiased">

    @include('components.navbar')

    <main>
        {{ $slot ?? '' }}
        @yield('content')
    </main>

    @include('components.footer')

</body>
</html>