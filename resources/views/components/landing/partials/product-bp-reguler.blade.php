<div id="bp" class="card overflow-hidden rounded-2xl shadow-xl transition-all duration-300">
    <div class="grid gap-8 px-8 pb-14 pt-8 lg:grid-cols-2">
        <!-- Product Images (Right) -->
        <div class="order-1 lg:order-2">
            <div className="min-h-screen bg-slate-900 flex items-center justify-center p-4">
                <div class="relative mx-auto w-full max-w-7xl overflow-hidden rounded-xl">
                    <!-- Main carousel container -->
                    <div class="relative h-[50vh] overflow-hidden md:h-[70vh]">
                        <!-- Slides -->
                        <div id="british-propolis-reguler-slides-container"
                             class="flex h-full transition-transform duration-500 ease-in-out">
                            <div class="relative w-full flex-shrink-0">
                                <img src="{{ Vite::asset('resources/images/products/british propolis reguler/1.jpg') }}"
                                     alt="British Propolis"
                                     class="h-full w-full object-cover">
                            </div>
                            <div class="relative w-full flex-shrink-0">
                                <img src="{{ Vite::asset('resources/images/products/british propolis reguler/2.jpg') }}"
                                     alt="British Propolis"
                                     class="h-full w-full object-cover">
                            </div>
                            <div class="relative w-full flex-shrink-0">
                                <img src="{{ Vite::asset('resources/images/products/british propolis reguler/3.jpg') }}"
                                     alt="British Propolis"
                                     class="h-full w-full object-cover">
                            </div>
                        </div>

                        <!-- Navigation buttons -->
                        <button id="british-propolis-reguler-prev-btn"
                                class="group absolute left-4 top-1/2 flex hidden h-12 w-12 -translate-y-1/2 items-center justify-center rounded-full bg-white/90 shadow-lg backdrop-blur-sm transition-all duration-200 hover:scale-110 hover:bg-white md:flex"
                                aria-label="Previous slide">
                            <i class="fas fa-chevron-left text-slate-700 group-hover:text-slate-900"></i>
                        </button>

                        <button id="british-propolis-reguler-next-btn"
                                class="group absolute right-4 top-1/2 flex hidden h-12 w-12 -translate-y-1/2 items-center justify-center rounded-full bg-white/90 shadow-lg backdrop-blur-sm transition-all duration-200 hover:scale-110 hover:bg-white md:flex"
                                aria-label="Next slide">
                            <i class="fas fa-chevron-right text-slate-700 group-hover:text-slate-900"></i>
                        </button>
                    </div>

                    <!-- Dot indicators -->
                    <div id="british-propolis-reguler-dots-container"
                         class="absolute bottom-4 left-1/2 flex -translate-x-1/2 gap-2">
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Description (Left) -->
        <div class="order-2 space-y-1 lg:order-1">
            <div>
                <h3 class="text-body-light-12 mb-4 text-3xl font-bold">
                    {{ __('product_bp_reguler.title') }}
                </h3>
                <p class="text-body-light-11 text-md leading-relaxed">
                    {{ __('product_bp_reguler.description_1') }}
                </p>
                <p class="text-body-light-11 text-md leading-relaxed">
                    {{ __('product_bp_reguler.description_2') }}
                </p>
            </div>

            <!-- Accordions -->
            <div class="accordion divide-neutral/20 divide-y">
                <div class="accordion-item" id="bp-reguler-manfaat-utama-arrow">
                    <button class="accordion-toggle inline-flex w-full items-center gap-x-4 pl-0 text-start"
                            aria-controls="bp-reguler-manfaat-utama-arrow-collapse"
                            aria-expanded="false">
                        <span
                              class="icon-[tabler--chevron-right] accordion-item-active:rotate-90 size-5 shrink-0 transition-transform duration-300 rtl:rotate-180"></span>
                        {{ __('product_bp_reguler.point.1.title') }}
                    </button>
                    <div id="bp-reguler-manfaat-utama-arrow-collapse"
                         class="accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                         aria-labelledby="bp-reguler-manfaat-utama-arrow"
                         role="region">
                        <div class="prose prose-sm md:prose-md w-full max-w-none pb-4">
                            {!! __('product_bp_reguler.point.1.description') !!}
                        </div>
                    </div>
                </div>
                <div class="accordion-item" id="bp-reguler-kelebihan-arrow">
                    <button class="accordion-toggle inline-flex w-full items-center gap-x-4 pl-0 text-start"
                            aria-controls="bp-reguler-kelebihan-arrow-collapse"
                            aria-expanded="false">
                        <span
                              class="icon-[tabler--chevron-right] accordion-item-active:rotate-90 size-5 shrink-0 transition-transform duration-300 rtl:rotate-180"></span>
                        {{ __('product_bp_reguler.point.2.title') }}
                    </button>
                    <div id="bp-reguler-kelebihan-arrow-collapse"
                         class="accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                         aria-labelledby="bp-reguler-kelebihan-arrow"
                         role="region">
                        <div class="w-full pb-4">
                            {!! __('product_bp_reguler.point.2.description') !!}
                        </div>
                    </div>
                </div>
                <div class="accordion-item" id="bp-reguler-informasi-produk-arrow">
                    <button class="accordion-toggle inline-flex w-full items-center gap-x-4 pl-0 text-start"
                            aria-controls="bp-reguler-informasi-produk-arrow-collapse"
                            aria-expanded="false">
                        <span
                              class="icon-[tabler--chevron-right] accordion-item-active:rotate-90 size-5 shrink-0 transition-transform duration-300 rtl:rotate-180"></span>
                        {{ __('product_bp_reguler.point.3.title') }}
                    </button>
                    <div id="bp-reguler-informasi-produk-arrow-collapse"
                         class="accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                         aria-labelledby="bp-reguler-informasi-produk-arrow"
                         role="region">
                        <div class="w-full pb-4">
                            {!! __('product_bp_reguler.point.3.description') !!}
                        </div>
                    </div>
                </div>
            </div>

            <!-- CTA Button -->
            <div class="flex items-center justify-center pb-4 pt-3 sm:pt-4">
                <a href="#"
                   class="btn btn-primary btn-sm sm:btn-lg w-full rounded-lg px-6 text-sm font-semibold shadow-lg transition-all duration-300 hover:shadow-xl sm:rounded-xl sm:px-8 sm:text-base">
                    {{ __('product_bp_reguler.cta') }}
                </a>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        const britishPropolisRegulerSlidesContainer = document.getElementById('british-propolis-reguler-slides-container');
        const britishPropolisRegulerPrevBtn = document.getElementById('british-propolis-reguler-prev-btn');
        const britishPropolisRegulerNextBtn = document.getElementById('british-propolis-reguler-next-btn');
        const britishPropolisRegulerDotsContainer = document.getElementById('british-propolis-reguler-dots-container');

        // Count actual slides from DOM
        const britishPropolisRegulerSlideElements = britishPropolisRegulerSlidesContainer.querySelectorAll(
            'div.relative.w-full.flex-shrink-0');
        const britishPropolisRegulerSlidesCount = britishPropolisRegulerSlideElements.length;

        let britishPropolisRegulerCurrentSlide = 0;
        let britishPropolisRegulerIsAutoPlaying = true;
        let britishPropolisRegulerAutoPlayInterval;

        // Touch/swipe variables
        let britishPropolisRegulerTouchStartX = 0;
        let britishPropolisRegulerTouchEndX = 0;
        let britishPropolisRegulerIsSwiping = false;

        // Create dots based on actual slide count
        for (let i = 0; i < britishPropolisRegulerSlidesCount; i++) {
            const dot = document.createElement('button');
            dot.className =
                `w-2 h-2 rounded-full transition-all duration-300 ${i === 0 ? 'bg-white w-6' : 'bg-white/50 hover:bg-white/75'}`;
            dot.setAttribute('aria-label', `Go to slide ${i + 1}`);
            dot.addEventListener('click', () => britishPropolisRegulerGoToSlide(i));
            britishPropolisRegulerDotsContainer.appendChild(dot);
        }

        const britishPropolisRegulerUpdateDots = () => {
            [...britishPropolisRegulerDotsContainer.children].forEach((dot, index) => {
                dot.className =
                    `w-2 h-2 rounded-full transition-all duration-300 ${index === britishPropolisRegulerCurrentSlide ? 'bg-white w-6' : 'bg-white/50 hover:bg-white/75'}`;
            });
        };

        const britishPropolisRegulerGoToSlide = index => {
            britishPropolisRegulerCurrentSlide = index;
            britishPropolisRegulerSlidesContainer.style.transform =
                `translateX(-${britishPropolisRegulerCurrentSlide * 100}%)`;
            britishPropolisRegulerUpdateDots();
            britishPropolisRegulerPauseAutoPlay();
        };

        const britishPropolisRegulerGoToPrevious = () => {
            britishPropolisRegulerCurrentSlide = (britishPropolisRegulerCurrentSlide - 1 +
                britishPropolisRegulerSlidesCount) % britishPropolisRegulerSlidesCount;
            britishPropolisRegulerSlidesContainer.style.transform =
                `translateX(-${britishPropolisRegulerCurrentSlide * 100}%)`;
            britishPropolisRegulerUpdateDots();
            britishPropolisRegulerPauseAutoPlay();
        };

        const britishPropolisRegulerGoToNext = () => {
            britishPropolisRegulerCurrentSlide = (britishPropolisRegulerCurrentSlide + 1) %
                britishPropolisRegulerSlidesCount;
            britishPropolisRegulerSlidesContainer.style.transform =
                `translateX(-${britishPropolisRegulerCurrentSlide * 100}%)`;
            britishPropolisRegulerUpdateDots();
            britishPropolisRegulerPauseAutoPlay();
        };

        const britishPropolisRegulerStartAutoPlay = () => {
            if (britishPropolisRegulerAutoPlayInterval) clearInterval(britishPropolisRegulerAutoPlayInterval);
            britishPropolisRegulerAutoPlayInterval = setInterval(() => {
                britishPropolisRegulerGoToNext();
            }, 5000);
        };

        const britishPropolisRegulerPauseAutoPlay = () => {
            britishPropolisRegulerIsAutoPlaying = false;
            clearInterval(britishPropolisRegulerAutoPlayInterval);
            setTimeout(() => {
                britishPropolisRegulerIsAutoPlaying = true;
                britishPropolisRegulerStartAutoPlay();
            }, 5000);
        };

        // Touch event handlers
        const britishPropolisRegulerHandleTouchStart = (e) => {
            britishPropolisRegulerTouchStartX = e.changedTouches[0].screenX;
            britishPropolisRegulerIsSwiping = true;
        };

        const britishPropolisRegulerHandleTouchEnd = (e) => {
            if (!britishPropolisRegulerIsSwiping) return;

            britishPropolisRegulerTouchEndX = e.changedTouches[0].screenX;
            const swipeDistance = britishPropolisRegulerTouchStartX - britishPropolisRegulerTouchEndX;
            const minSwipeDistance = 50;

            if (Math.abs(swipeDistance) > minSwipeDistance) {
                if (swipeDistance > 0) {
                    // Swipe left - next slide
                    britishPropolisRegulerGoToNext();
                } else {
                    // Swipe right - previous slide
                    britishPropolisRegulerGoToPrevious();
                }
            }

            britishPropolisRegulerIsSwiping = false;
        };

        // Add touch event listeners
        britishPropolisRegulerSlidesContainer.addEventListener('touchstart', britishPropolisRegulerHandleTouchStart, {
            passive: true
        });
        britishPropolisRegulerSlidesContainer.addEventListener('touchend', britishPropolisRegulerHandleTouchEnd, {
            passive: true
        });

        britishPropolisRegulerPrevBtn.addEventListener('click', britishPropolisRegulerGoToPrevious);
        britishPropolisRegulerNextBtn.addEventListener('click', britishPropolisRegulerGoToNext);

        britishPropolisRegulerStartAutoPlay();
    </script>
@endpush

