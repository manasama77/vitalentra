<header class="ic-navbar absolute left-0 top-0 z-40 flex w-full items-center bg-transparent md:py-1"
        role="banner"
        aria-label="Navigation bar">
    <div class="container">
        <div class="ic-navbar-container relative -mx-5 flex items-center justify-between">
            <div class="w-20 max-w-full px-5 lg:w-20">
                <a href="{{ route('home') }}" class="ic-navbar-logo text-primary-color block w-full">
                    <img src="{{ Vite::asset('resources/images/logo.png') }}"
                         alt="Vitalentra Logo"
                         class="w-full"
                         id="NavbarBrandWhite"
                         data-name="NavbarBrand">
                    <img src="{{ Vite::asset('resources/images/logo.png') }}"
                         alt="Vitalentra Logo"
                         class="hidden w-full"
                         id="NavbarBrandDark"
                         data-name="NavbarBrand">
                </a>
            </div>
            <div class="flex w-full items-center justify-between px-5">
                <div>
                    <button type="button"
                            class="ic-navbar-toggler text-primary absolute right-4 top-1/2 block -translate-y-1/2 rounded-md px-3 py-[6px] text-[22px]/none ring-white transition-colors duration-300 focus:ring-2 lg:hidden"
                            data-web-toggle="navbar-collapse"
                            data-web-target="navbarMenu"
                            aria-expanded="false"
                            aria-label="Toggle navigation menu">
                        <i class="fa-solid fa-bars"></i>
                    </button>

                    <nav id="navbarMenu"
                         class="ic-navbar-collapse bg-primary-light-1 absolute right-4 top-[48px] hidden w-full max-w-[250px] rounded-lg py-5 shadow-lg lg:static lg:block lg:w-full lg:max-w-full lg:bg-transparent lg:py-0 lg:shadow-none xl:px-6">
                        <ul class="block lg:flex"
                            role="menu"
                            aria-label="Navigation menu">
                            <li class="group relative">
                                <a href="{{ route('home') }}"
                                   class="group-hover:text-base-content lg:text-primary {{ request()->routeIs('home') ? 'active' : '' }} mx-8 flex py-2 text-base font-medium lg:mx-0 lg:inline-flex lg:px-0 lg:py-6 lg:group-hover:opacity-70"
                                   role="menuitem">
                                    {{ __('menu.home') }}
                                </a>
                            </li>

                            <li class="group relative">
                                @php
                                    $is_home = request()->routeIs('home');
                                    $link = $is_home ? '#about' : route('home') . '#about';
                                @endphp
                                <a href="{{ $link }}"
                                   class="{{ $is_home ? 'ic-page-scroll' : '' }} group-hover:text-base-content lg:text-primary mx-8 flex py-2 text-base font-medium lg:mr-0 lg:inline-flex lg:px-0 lg:py-6 lg:group-hover:opacity-70"
                                   role="menuitem">
                                    {{ __('menu.about') }}
                                </a>
                            </li>

                            <li class="group relative">
                                @php
                                    $is_home = request()->routeIs('home');
                                    $link = $is_home ? '#product' : route('home') . '#product';
                                @endphp
                                <a href="{{ $link }}"
                                   class="{{ $is_home ? 'ic-page-scroll' : '' }} group-hover:text-base-content lg:text-primary mx-8 flex py-2 text-base font-medium lg:mr-0 lg:inline-flex lg:px-0 lg:py-6 lg:group-hover:opacity-70"
                                   role="menuitem">
                                    {{ __('menu.product') }}
                                </a>
                            </li>

                            <li class="group relative">
                                @php
                                    $is_home = request()->routeIs('home');
                                    $link = $is_home ? '#faq' : route('home') . '#faq';
                                @endphp
                                <a href="{{ $link }}"
                                   class="{{ $is_home ? 'ic-page-scroll' : '' }} group-hover:text-base-content lg:text-primary mx-8 flex py-2 text-base font-medium lg:mr-0 lg:inline-flex lg:px-0 lg:py-6 lg:group-hover:opacity-70"
                                   role="menuitem">
                                    {{ __('menu.faq') }}
                                </a>
                            </li>

                            <li class="group relative">
                                @php
                                    $is_home = request()->routeIs('home');
                                    $link = $is_home ? '#blog' : route('news.list');
                                    $is_news = request()->routeIs('news.*') ? 'active' : '';
                                @endphp
                                <a href="{{ $link }}"
                                   class="{{ $is_home ? 'ic-page-scroll' : '' }} group-hover:text-base-content lg:text-primary {{ $is_news }} mx-8 flex py-2 text-base font-medium lg:mr-0 lg:inline-flex lg:px-0 lg:py-6 lg:group-hover:opacity-70"
                                   role="menuitem">
                                    {{ __('menu.news_and_blog') }}
                                </a>
                            </li>

                            <li class="group relative">
                                @php
                                    $is_home = request()->routeIs('home');
                                    $link = $is_home ? '#contact' : route('home') . '#contact';
                                @endphp
                                <a href="{{ $link }}"
                                   class="{{ $is_home ? 'ic-page-scroll' : '' }} group-hover:text-base-content lg:text-primary mx-8 flex py-2 text-base font-medium lg:mr-0 lg:inline-flex lg:px-0 lg:py-6 lg:group-hover:opacity-70"
                                   role="menuitem">
                                    {{ __('menu.contact') }}
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="flex items-center justify-end gap-6 pr-[52px] lg:pr-0">
                    <x-landing.language />
                    <button type="button"
                            class="text-primary-color hidden items-center text-[22px]/none"
                            aria-label="Switch theme"
                            data-web-trigger="web-theme"></button>
                </div>
            </div>
        </div>
    </div>
</header>

