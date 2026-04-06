<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', __('app.site_name') . ' — ' . __('app.tagline'))</title>
    <meta name="description" content="@yield('meta_description', __('app.hero.subtitle'))">
    <meta name="keywords" content="@yield('meta_keywords', 'salon kecantikan, beauty salon, perawatan rambut, spa, Lady Salon Sri Windany')">
    
    <!-- Open Graph -->
    <meta property="og:title" content="@yield('title', __('app.site_name'))">
    <meta property="og:description" content="@yield('meta_description', __('app.hero.subtitle'))">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    
    <!-- Canonical -->
    <link rel="canonical" href="{{ url()->current() }}">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    @stack('styles')
</head>
<body style="background-color: #fdf9f7;">
    @include('components.navbar')
    
    <main>
        @yield('content')
    </main>
    
    @include('components.footer')
    @include('components.whatsapp-button')
    
    @stack('scripts')
</body>
</html>
