<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @php
        $metaTitle = trim($__env->yieldContent('meta_title', $seoSetting->meta_title ?: $siteSetting->site_title ?: 'Laravel Developer Portfolio'));
        $metaDescription = trim($__env->yieldContent('meta_description', $seoSetting->meta_description ?: 'Professional Laravel developer portfolio.'));
        $canonicalUrl = trim($__env->yieldContent('canonical_url', $seoSetting->canonical_url ?: url()->current()));
        $ogImage = trim($__env->yieldContent('og_image', $seoSetting->og_image_url));
        $robots = ($seoSetting->robots_index ? 'index' : 'noindex') . ', ' . ($seoSetting->robots_follow ? 'follow' : 'nofollow');
    @endphp

    <title>{{ $metaTitle }}</title>
    <meta name="description" content="{{ $metaDescription }}">
    <meta name="robots" content="{{ $robots }}">
    <link rel="canonical" href="{{ $canonicalUrl }}">

    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $metaTitle }}">
    <meta property="og:description" content="{{ $metaDescription }}">
    <meta property="og:url" content="{{ $canonicalUrl }}">
    <meta property="og:image" content="{{ $ogImage }}">

    <meta name="twitter:card" content="{{ $seoSetting->twitter_card ?: 'summary_large_image' }}">
    <meta name="twitter:title" content="{{ $metaTitle }}">
    <meta name="twitter:description" content="{{ $metaDescription }}">
    <meta name="twitter:image" content="{{ $ogImage }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/devicon.min.css">
    @if($siteSetting->favicon)
        <link rel="icon" href="{{ asset('storage/' . $siteSetting->favicon) }}">
    @endif
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
