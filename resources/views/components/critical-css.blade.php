<style>
    /* Critical CSS for above-the-fold content */
    body {
        margin: 0;
        font-family: Inter, system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        line-height: 1.6;
        background-color: #f9f9fb;
        color: #1e1f24;
    }

    /* Critical navigation styles */
    .navbar,
    .ic-navbar {
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 1000;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        height: 72px;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
    }

    /* Hero section critical styles */
    .hero-section {
        min-height: 100vh;
        display: flex;
        align-items: center;
        position: relative;
        padding-top: 72px;
    }

    /* Essential layout utilities */
    .container {
        margin-inline: auto;
        padding-inline: 1.25rem;
        max-width: 1200px;
    }

    .main {
        position: relative;
    }

    .flex {
        display: flex;
    }

    .grid {
        display: grid;
    }

    .hidden {
        display: none;
    }

    .block {
        display: block;
    }

    /* Essential spacing */
    .p-4 {
        padding: 1rem;
    }

    .p-6 {
        padding: 1.5rem;
    }

    .m-0 {
        margin: 0;
    }

    .mb-4 {
        margin-bottom: 1rem;
    }

    .mb-6 {
        margin-bottom: 1.5rem;
    }

    /* Essential text utilities */
    .text-center {
        text-align: center;
    }

    .text-white {
        color: white;
    }

    .text-xl {
        font-size: 1.25rem;
    }

    .text-2xl {
        font-size: 1.5rem;
    }

    .text-3xl {
        font-size: 1.875rem;
    }

    .font-bold {
        font-weight: 700;
    }

    .font-semibold {
        font-weight: 600;
    }

    /* Essential button styles */
    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0.75rem 1.5rem;
        border-radius: 0.5rem;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.2s ease;
        cursor: pointer;
        border: none;
    }

    .btn-primary {
        background: #3d63dd;
        color: white;
    }

    .btn-primary:hover {
        background: #3657c3;
        transform: translateY(-1px);
    }

    /* Loading state */
    .page-loading {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: #fff;
        z-index: 9999;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: opacity 1s ease;
    }

    .page-loading.hide {
        opacity: 0;
        pointer-events: none;
    }

    /* Floating action buttons */
    .fixed {
        position: fixed;
    }

    .bottom-20 {
        bottom: 5rem;
    }

    .right-5 {
        right: 1.25rem;
    }

    .z-50 {
        z-index: 50;
    }

    /* Image loading optimization */
    img {
        max-width: 100%;
        height: auto;
    }

    img[loading="lazy"] {
        opacity: 0;
        transition: opacity 0.3s;
    }

    img[loading="lazy"].loaded,
    img.loaded {
        opacity: 1;
    }

    /* Smooth scrolling */
    html {
        scroll-behavior: smooth;
    }

    /* Accessibility */
    @media (prefers-reduced-motion: reduce) {

        *,
        *::before,
        *::after {
            animation-duration: 0.01ms !important;
            animation-iteration-count: 1 !important;
            transition-duration: 0.01ms !important;
            scroll-behavior: auto !important;
        }
    }

    /* Responsive utilities */
    @media (min-width: 640px) {
        .container {
            padding-inline: 2rem;
        }

        .sm\\:text-4xl {
            font-size: 2.25rem;
        }
    }

    @media (min-width: 768px) {
        .md\\:text-5xl {
            font-size: 3rem;
        }
    }

    @media (min-width: 1024px) {
        .lg\\:text-6xl {
            font-size: 3.75rem;
        }
    }

    /* Font loading optimization */
    @font-face {
        font-family: 'Inter';
        font-style: normal;
        font-weight: 400;
        font-display: swap;
        src: url('https://fonts.gstatic.com/s/inter/v18/UcCO3FwrK3iLTeHuS_fvQtMwCp50KnMw2boKoduKmMEVuLyfAZ9hiJ-Ek-_EeA.woff2') format('woff2');
        unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
    }
</style>

