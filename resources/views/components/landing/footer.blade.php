<footer class="from-base-content to-primary bg-gradient-to-br text-white">
    <div class="container mx-auto px-6 pb-6 pt-12">
        <div class="grid grid-cols-1 gap-8 px-4 md:grid-cols-3 md:px-6">

            <!-- Left Section: Logo + Description + Social Media -->
            <div class="space-y-4">
                <div class="flex flex-col items-start justify-center gap-2">
                    <div class="flex items-center justify-center gap-4">
						<div class="size-18 md:size-24">
                            <img src="{{ Vite::asset('resources/images/logo_white.png') }}"
                                 alt="Vitalentra Group International (VGI) Logo"
                                 class="w-full" />
                        </div>
                        <div class="size-18 md:size-24">
                            <img src="{{ Vite::asset('resources/images/BP Group Logo.png') }}"
                                 alt="BP Group Logo"
                                 class="w-full" />
                        </div>
                    </div>
                    <span class="text-xl font-bold">Vitalentra Group International (VGI)</span>
                </div>

                <p class="max-w-xs text-sm leading-relaxed text-gray-300">
                    {{ __('footer.description') }}
                </p>

                <p class="max-w-md text-sm font-bold leading-relaxed text-gray-300">
                    {!! __('footer.info') !!}
                </p>

                <!-- Social Media Icons -->
                <div class="flex space-x-4 pt-4">
                    <a href="https://www.instagram.com/vitalentra.official/"
                       class="flex h-8 w-8 items-center justify-center rounded-full bg-gray-700 transition-colors duration-200 hover:bg-pink-600">
                        <i class="fab fa-instagram text-sm text-white"></i>
                    </a>
                    <a href="https://www.tiktok.com/@vitalentra"
                       class="flex h-8 w-8 items-center justify-center rounded-full bg-gray-700 transition-colors duration-200 hover:bg-black">
                        <i class="fab fa-tiktok text-sm text-white"></i>
                    </a>
                    <a href="https://www.facebook.com/profile.php?id=61578860111813"
                       class="flex h-8 w-8 items-center justify-center rounded-full bg-gray-700 transition-colors duration-200 hover:bg-blue-800">
                        <i class="fab fa-facebook-f text-sm text-white"></i>
                    </a>
                </div>
            </div>

            <!-- Center Section: Navigation Menu -->
            <div class="space-y-4">
                <h3 class="text-lg font-semibold text-white">Menu</h3>
                <nav class="space-y-3">
                    <a href="{{ route('home') }}"
                       class="text-md block text-gray-300 transition-colors duration-200 hover:text-white">
                        {{ __('menu.home') }}
                    </a>
                    <a href="{{ route('home') }}#about"
                       class="text-md block text-gray-300 transition-colors duration-200 hover:text-white">
                        {{ __('menu.about') }}
                    </a>
                    <a href="{{ route('home') }}#product"
                       class="text-md block text-gray-300 transition-colors duration-200 hover:text-white">
                        {{ __('menu.product') }}
                    </a>
                    <a href="{{ route('home') }}#faq"
                       class="text-md block text-gray-300 transition-colors duration-200 hover:text-white">
                        {{ __('menu.faq') }}
                    </a>
                    <a href="{{ route('news.list') }}"
                       class="text-md block text-gray-300 transition-colors duration-200 hover:text-white">
                        {{ __('menu.news_and_blog') }}
                    </a>
                    <a href="{{ route('home') }}#contact"
                       class="text-md block text-gray-300 transition-colors duration-200 hover:text-white">
                        {{ __('menu.contact') }}
                    </a>
                </nav>
            </div>

            <!-- Right Section: Products -->
            <div class="space-y-4">
                <h3 class="text-lg font-semibold text-white">
                    {{ __('footer.product') }}
                </h3>
                <div class="space-y-3">
                    <a href="{{ route('home') }}#steffi"
                       class="text-md block text-gray-300 transition-colors duration-200 hover:text-white">
                        Steffi
                    </a>
                    <a href="{{ route('home') }}#bp"
                       class="text-md block text-gray-300 transition-colors duration-200 hover:text-white">
                        British Propolis
                    </a>
                    <a href="{{ route('home') }}#bp-green"
                       class="text-md block text-gray-300 transition-colors duration-200 hover:text-white">
                        BP Green
                    </a>
                    <a href="{{ route('home') }}#bp-norway"
                       class="text-md block text-gray-300 transition-colors duration-200 hover:text-white">
                        BP Norway
                    </a>
                    <a href="{{ route('home') }}#belgie"
                       class="text-md block text-gray-300 transition-colors duration-200 hover:text-white">
                        Belgie
                    </a>
                </div>
            </div>
        </div>

        <!-- Bottom Border -->
        <div class="mt-6 border-t border-white pt-4">
            <div class="flex flex-col items-center justify-between space-y-4 md:flex-row md:space-y-0">
                <p class="text-sm text-gray-400">
                    © {{ date('Y') }} Vitalentra. All rights reserved.
                </p>
            </div>
        </div>
    </div>
</footer>
