<section id="collaboration" class="bg-base-100 mx-auto w-full px-4 py-12">
    <div class="mx-auto max-w-7xl">
        <div class="text-center">
            <h2 class="text-base-content scroll-revealed text-2xl md:text-4xl">
                {{ __('collaboration.title') }}
            </h2>
        </div>
        <div id="collaboration-carousel"
            data-carousel='{ "loadingClasses": "opacity-0", "dotsItemClasses": "carousel-dot", "slidesQty": { "xs": 1, "md": 3, "lg": 3 }, "isDraggable": true, "isAutoPlay": true, "speed": 5000 }'
            class="scroll-revealed relative w-full">
            <div class="carousel h-80">
                <div class="carousel-body h-full opacity-0">
                    <!-- Slide 1 -->
                    <div class="carousel-slide">
                        <div class="flex h-full items-center justify-center p-6">
                            <img src="{{ Vite::asset('resources/images/Logo Citilink.png') }}" alt="Citilink" class="collaboration-image" />
                        </div>
                    </div>
                    <!-- Slide 2 -->
                    <div class="carousel-slide">
                        <div class="flex h-full items-center justify-center p-6">
                            <img src="{{ Vite::asset('resources/images/Logo Garuda Indonesia.png') }}" alt="Garuda Indonesia"
                                class="collaboration-image" />
                        </div>
                    </div>
                    <!-- Slide 3 -->
                    <div class="carousel-slide">
                        <div class="flex h-full items-center justify-center p-6">
                            <img src="{{ Vite::asset('resources/images/Logo Grid.png') }}" alt="Grid" class="collaboration-image" />
                        </div>
                    </div>
                    <!-- Slide 4 -->
                    <div class="carousel-slide">
                        <div class="flex h-full items-center justify-center p-6">
                            <img src="{{ Vite::asset('resources/images/Logo Hello Kitty.png') }}" alt="Hello Kitty" class="collaboration-image" />
                        </div>
                    </div>
                    <!-- Slide 5 -->
                    <div class="carousel-slide">
                        <div class="flex h-full items-center justify-center p-6">
                            <img src="{{ Vite::asset('resources/images/Logo PCN.png') }}" alt="PCN" class="collaboration-image" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-pagination absolute bottom-3 end-0 start-0 flex justify-center gap-3"></div>
        </div>

        {{-- <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mb-8 text-center sm:mb-16 lg:mb-16">
            <h2 class="text-base-content scroll-revealed mb-6 text-2xl md:text-4xl">
                {{ __('collaboration.title') }}
            </h2>
        </div>

        <div class="swiper collaboration-carousel common-carousel scroll-revealed">
            <div class="swiper-wrapper flex items-center">
                <div class="swiper-slide">
                    <img src="{{ Vite::asset('resources/images/Logo Citilink.png') }}" alt="Citilink" class="collaboration-image" />
                </div>
                <div class="swiper-slide">
                    <img src="{{ Vite::asset('resources/images/Logo Garuda Indonesia.png') }}" alt="Garuda Indonesia" class="collaboration-image" />
                </div>
                <div class="swiper-slide">
                    <img src="{{ Vite::asset('resources/images/Logo Grid.png') }}" alt="Grid" class="collaboration-image" />
                </div>
                <div class="swiper-slide">
                    <img src="{{ Vite::asset('resources/images/Logo Hello Kitty.png') }}" alt="Hello Kitty" class="collaboration-image" />
                </div>
                <div class="swiper-slide">
                    <img src="{{ Vite::asset('resources/images/Logo PCN.png') }}" alt="PCN" class="collaboration-image" />
                </div>
            </div>
        </div>
     --}}
    </div>
</section>

