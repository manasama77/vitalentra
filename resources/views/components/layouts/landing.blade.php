<!DOCTYPE html>
<html lang="en" data-theme="vitalentra">

<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Copyright" content="Vitalentra" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Ranyeh" />
    <meta name="rating" content="general" />
    <meta name="language" content="English" />
    <meta name="application-name" content="Vitalentra" />
    <meta name="description" content="@yield('description', 'Mulai Hidup Sehat Bersama Vitalentra')" />
    <meta name="keywords" content="company" />
    <meta name="twitter:title" content="@yield('title', 'Vitalentra')" />
    <meta name="twitter:description" content="@yield('description', 'Mulai Hidup Sehat Bersama Vitalentra')" />
    {{-- <meta name="twitter:image" content="@yield('image', './vitalentra-cover.png')" /> --}}
    <meta name="twitter:image" content="@yield('image', asset('vitalentra-cover.webp'))" />
    <meta content="@yield('image', asset('vitalentra-cover.webp'))" property="og:image" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="628" />
    <meta property="og:image:type" content="image/webp" />

    <meta name="twitter:image" content="@yield('image', './vitalentra-cover.png')" />
    <meta content="@yield('title', 'Vitalentra')" property="og:title" />
    <meta content="Vitalentra" property="og:site_name" />
    <meta content="@yield('description', 'Mulai Hidup Sehat Bersama Vitalentra')" property="og:description" />
    <meta content="https://vitalentra.com{{ request()->getPathInfo() }}" property="og:url" />
    <meta content="website" property="og:type" />

    <meta name="msapplication-TileColor" content="#fff" />
    <meta name="msapplication-TileImage" content="./web-app-manifest-192x192.png" />
    <meta name="theme-color" content="#fff" />

    <!-- Page title -->
    <title>@yield('title', 'Vitalentra')</title>

    <!-- Canonical -->
    <link rel="canonical" href="https://vitalentra.com{{ request()->getPathInfo() }}" />

    <!-- Resource hints untuk performance -->
    <link rel="dns-prefetch" href="//cdn.jsdelivr.net">
    <link rel="dns-prefetch" href="//cdnjs.cloudflare.com">
    <link rel="dns-prefetch" href="//unpkg.com">
    <link rel="preconnect"
          href="https://cdn.jsdelivr.net"
          crossorigin>
    <link rel="preconnect"
          href="https://cdnjs.cloudflare.com"
          crossorigin>

    <!-- perbaikan -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect"
          href="https://fonts.gstatic.com"
          crossorigin>

    <!-- Favicon -->
    <link rel="icon"
          type="image/png"
          href="/favicon-96x96.png"
          sizes="96x96" />
    <link rel="icon"
          type="image/svg+xml"
          href="/favicon.svg" />
    <link rel="shortcut icon" href="/favicon.ico" />
    <link rel="apple-touch-icon"
          sizes="180x180"
          href="/apple-touch-icon.png" />
    <meta name="apple-mobile-web-app-title" content="Vitalentra" />
    <link rel="manifest" href="/site.webmanifest" />

    <!-- CSS Plugins -->
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" /> --}}
    <link rel="preload"
          href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
          as="style"
          onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    </noscript>

    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" /> --}}
    <link rel="preload"
          href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css"
          as="style"
          onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">
    </noscript>

    {{-- <link rel="stylesheet" href="https://cdn.lineicons.com/5.0/lineicons.css" /> --}}
    <link rel="preload"
          href="https://cdn.lineicons.com/5.0/lineicons.css"
          as="style"
          onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="https://cdn.lineicons.com/5.0/lineicons.css">
    </noscript>

    {{-- <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css"
          integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ=="
          crossorigin="anonymous"
          referrerpolicy="no-referrer" /> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css"> --}}
    <link rel="preload"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css"
          as="style"
          onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css">
    </noscript>

    <style>
        /* Critical CSS - inline above-the-fold styles */
        body {
            margin: 0;
            font-family: system-ui, sans-serif;
        }

        .hero-section {
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        /* Add other critical styles for above-the-fold content */
    </style>

    @vite(['resources/css/landing.css', 'resources/js/landing.js', 'resources/js/modal.js', 'resources/js/app.js'])
    @stack('styles')
</head>

<body class="bg-base-200">
    <!-- Page loading -->
    <x-landing.loading />

    <!-- Navbar -->
    <x-landing.navbar />

    <main class="main relative">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <x-landing.footer />

    {{-- FLOATING ACTION BUTTONS --}}
    <div class="fixed bottom-20 right-5 z-50 flex flex-col gap-4">
        <button type="button"
                class="bg-primary text-primary-color hover:bg-primary-light-10 focus:bg-primary-light-10 is-hided visible inline-flex size-12 items-center justify-center rounded-md text-lg/none opacity-100 transition-all duration-300 hover:-translate-y-1"
                data-web-trigger="scroll-top"
                aria-label="Scroll to top">
            <i class="fas fa-chevron-up"></i>
        </button>

        <a href="https://wa.me/6281234677747"
           target="_blank"
           class="is-hided visible inline-flex size-12 items-center justify-center rounded-md bg-green-500 text-lg/none text-white opacity-100 transition-all duration-300 hover:-translate-y-1 hover:bg-green-600 focus:bg-green-600"
           aria-label="Contact us on WhatsApp"
           data-web-trigger="whatsapp"
           aria-label="WhatsApp">
            <i class="fab fa-whatsapp"></i>
        </a>
    </div>

    {{-- <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js"></script>
    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script> --}}

    <script defer src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js"></script>
    <script defer src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>

    <script>
        function initializeComponents() {
            // Check if all libraries are loaded
            if (typeof ScrollReveal === 'undefined' ||
                typeof GLightbox === 'undefined' ||
                typeof Swiper === 'undefined') {
                // Retry after 50ms if libraries not ready
                setTimeout(initializeComponents, 50);
                return;
            }

            // Scroll Reveal
            const sr = ScrollReveal({
                origin: "bottom",
                distance: "16px",
                duration: 1000,
                reset: false,
            });

            sr.reveal(`.scroll-revealed`, {
                cleanup: true,
            });

            // GLightBox
            GLightbox({
                selector: ".video-popup",
                href: "{{ asset('assets/video/STEFFI FINAL VO REV 2 (1).mp4') }}",
                type: "video",
                source: "local",
                width: 1024,
                autoplayVideos: true,
            });

            const myGallery3 = GLightbox({
                selector: ".portfolio-box",
                type: "image",
                width: 900,
            });

            const testimonialSwiper = new Swiper(".testimonial-carousel", {
                slidesPerView: 1,
                spaceBetween: 30,
                loop: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },

                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },

                breakpoints: {
                    640: {
                        slidesPerView: 2,
                        spaceBetween: 30,
                    },
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 30,
                    },
                    1280: {
                        slidesPerView: 3,
                        spaceBetween: 30,
                    },
                },
            });
        }

        // Start initialization when DOM is ready
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initializeComponents);
        } else {
            initializeComponents();
        }
    </script>

    @stack('scripts')
</body>

</html>

