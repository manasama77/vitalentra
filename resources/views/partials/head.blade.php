<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>{{ $title ?? config('app.name') }}</title>

<!-- SEO Meta Tags -->
<meta name="description" content="{{ $description ?? 'Vitalentra - Your trusted partner for quality products and services' }}" />
<meta name="keywords" content="{{ $keywords ?? 'vitalentra, products, services, quality' }}" />
<meta name="author" content="Vitalentra" />

<!-- Canonical URL -->
<link rel="canonical" href="{{ $canonical ?? request()->url() }}" />

<!-- Open Graph Meta Tags -->
<meta property="og:title" content="{{ $title ?? config('app.name') }}" />
<meta property="og:description" content="{{ $description ?? 'Vitalentra - Your trusted partner for quality products and services' }}" />
<meta property="og:url" content="{{ $canonical ?? request()->url() }}" />
<meta property="og:type" content="{{ $ogType ?? 'website' }}" />
<meta property="og:site_name" content="{{ config('app.name') }}" />

<!-- Twitter Card Meta Tags -->
<meta name="twitter:card" content="summary" />
<meta name="twitter:title" content="{{ $title ?? config('app.name') }}" />
<meta name="twitter:description" content="{{ $description ?? 'Vitalentra - Your trusted partner for quality products and services' }}" />

<link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />

<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

@vite(['resources/css/app.css', 'resources/js/app.js'])
@fluxAppearance

