<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="vitalentra">

<head>
    @include('partials.landing.head')
</head>

<body class="bg-base-200" data-theme="vitalentra">
    <!-- Page loading -->
    {{-- <x-landing.loading /> --}}

    <!-- Navbar -->
    <x-landing.navbar />

    <!-- Main Content with top padding to account for fixed navbar -->
    <main class="main-content relative">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <x-landing.footer />

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js"></script>
    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>

</body>

</html>
