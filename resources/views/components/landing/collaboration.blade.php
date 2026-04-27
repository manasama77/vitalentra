<section id="collaboration" class="section-area">
    <div class="mx-auto max-w-7xl">
        <div class="text-center">
            <h2 class="text-base-content scroll-revealed text-2xl md:text-4xl">
                {{ __('collaboration.title') }}
            </h2>
        </div>
        <div id="collaboration-carousel"
            data-carousel='{ "loadingClasses": "opacity-0", "dotsItemClasses": "carousel-dot", "slidesQty": { "xs": 1, "md": 3, "lg": 3 }, "isAutoPlay": true, "speed": 5000, "isDraggable": true, "isInfiniteLoop": true }'
            class="scroll-revealed relative w-full">
            <div class="carousel flex h-80">
                <div class="carousel-body carousel-dragging:transition-none carousel-dragging:cursor-grabbing h-full cursor-grab opacity-0">
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
                            <img src="{{ Vite::asset('resources/images/Logo Baby Shark.webp') }}" alt="Baby Shark" class="collaboration-image" />
                        </div>
                    </div>
                    <!-- Slide 6 -->
                    <div class="carousel-slide">
                        <div class="flex h-full items-center justify-center p-6">
                            <img src="{{ Vite::asset('resources/images/Logo PCN.png') }}" alt="PCN" class="collaboration-image" />
                        </div>
                    </div>
                    <div class="carousel-slide">
                        <div class="flex h-full items-center justify-center p-6">
                            <img src="{{ Vite::asset('resources/images/BP Group Logo.png') }}" alt="BP Group" class="collaboration-image" />
                        </div>
                    </div>
                    <!-- Slide 8 -->
                    <div class="carousel-slide">
                        <div class="flex h-full items-center justify-center p-6">
                            <img src="{{ Vite::asset('resources/images/LOGO-JAKPRO.png') }}" alt="JAKPRO" class="collaboration-image" />
                        </div>
                    </div>
                    <!-- Slide 9 -->
                    <div class="carousel-slide">
                        <div class="flex h-full items-center justify-center p-6">
                            <img src="{{ Vite::asset('resources/images/LOGO-VELODROME.png') }}" alt="VELODROME" class="collaboration-image" />
                        </div>
                    </div>
                    <!-- Slide 10 -->
                    <div class="carousel-slide">
                        <div class="flex h-full items-center justify-center p-6">
                            <img src="{{ Vite::asset('resources/images/LOGO-DAF-SPORTS-CENTER.png') }}" alt="DAF SPORTS CENTER" class="collaboration-image" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-pagination absolute bottom-3 end-0 start-0 flex justify-center gap-3"></div>
        </div>
    </div>
</section>

