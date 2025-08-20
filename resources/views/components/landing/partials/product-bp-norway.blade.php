<div id="bp-norway" class="card bg-base-100 scroll-revealed rounded-2xl shadow-xl">
    <div class="card-body">
        <div class="grid w-full gap-6 sm:gap-8 lg:grid-cols-2">
            <!-- Product Images (Right) -->
            <div class="order-1 lg:order-2">
                <div className="min-h-screen bg-slate-900 flex items-center justify-center p-4">
                    <div class="relative mx-auto w-full max-w-7xl overflow-hidden rounded-xl">
                        <!-- Main carousel container -->
                        <div class="relative h-[50vh] overflow-hidden md:h-[70vh]">
                            <!-- Slides -->
                            <div id="bp-norway-slides-container"
                                 class="flex h-full transition-transform duration-500 ease-in-out">
                                <div class="relative w-full flex-shrink-0">
                                    <img src="{{ Vite::asset('resources/images/products/british propolis norway/1.jpg') }}"
                                         alt="Modern Architecture"
                                         class="h-full w-full object-cover">
                                </div>
                                <div class="relative w-full flex-shrink-0">
                                    <img src="{{ Vite::asset('resources/images/products/british propolis norway/2.jpg') }}"
                                         alt="Nature Landscape"
                                         class="h-full w-full object-cover">
                                </div>
                                <div class="relative w-full flex-shrink-0">
                                    <img src="{{ Vite::asset('resources/images/products/british propolis norway/3.jpg') }}"
                                         alt="City Skyline"
                                         class="h-full w-full object-cover">
                                </div>
                            </div>

                            <!-- Navigation buttons -->
                            <button id="bp-norway-prev-btn"
                                    class="group absolute left-4 top-1/2 flex hidden h-12 w-12 -translate-y-1/2 items-center justify-center rounded-full bg-white/90 shadow-lg backdrop-blur-sm transition-all duration-200 hover:scale-110 hover:bg-white md:flex"
                                    aria-label="Previous slide">
                                <i class="fas fa-chevron-left text-slate-700 group-hover:text-slate-900"></i>
                            </button>

                            <button id="bp-norway-next-btn"
                                    class="group absolute right-4 top-1/2 flex hidden h-12 w-12 -translate-y-1/2 items-center justify-center rounded-full bg-white/90 shadow-lg backdrop-blur-sm transition-all duration-200 hover:scale-110 hover:bg-white md:flex"
                                    aria-label="Next slide">
                                <i class="fas fa-chevron-right text-slate-700 group-hover:text-slate-900"></i>
                            </button>
                        </div>

                        <!-- Dot indicators -->
                        <div id="bp-norway-dots-container"
                             class="absolute bottom-4 left-1/2 flex -translate-x-1/2 gap-2">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Description (Left) -->
            <div class="order-2 w-full min-w-0 space-y-4 overflow-hidden sm:space-y-6 lg:order-1">
                <div class="mb-4 w-full">
                    <h3 class="text-base-content mb-3 break-words text-2xl font-bold sm:mb-4 sm:text-3xl">
                        {{ __('product_bp_norway.title') }}
                    </h3>
                    <p class="text-base-content hyphens-auto break-words text-sm leading-relaxed sm:text-base">
                        {{ __('product_bp_norway.description_1') }}
                    </p>
                    <p class="text-base-content hyphens-auto break-words text-sm leading-relaxed sm:text-base">
                        {{ __('product_bp_norway.description_2') }}
                    </p>
                </div>

                <!-- Accordions -->
                <div class="accordion divide-neutral/20 divide-y">
                    <div class="accordion-item" id="bp-norway-manfaat">
                        <button class="accordion-toggle inline-flex items-center gap-x-4 pl-0 text-start"
                                aria-controls="bp-norway-manfaat-collapse"
                                aria-expanded="false">
                            <span
                                  class="icon-[tabler--chevron-right] accordion-item-active:rotate-90 size-5 shrink-0 transition-transform duration-300 rtl:rotate-180"></span>
                            {{ __('product_bp_norway.point.1.title') }}
                        </button>
                        <div id="bp-norway-manfaat-collapse"
                             class="accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                             aria-labelledby="bp-norway-manfaat"
                             role="region">
                            <div class="prose prose-sm md:prose-md w-full max-w-none pb-4">
                                {!! __('product_bp_norway.point.1.description') !!}
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item" id="bp-norway-kelebihan">
                        <button class="accordion-toggle inline-flex items-center gap-x-4 pl-0 text-start"
                                aria-controls="bp-norway-kelebihan-collapse"
                                aria-expanded="false">
                            <span
                                  class="icon-[tabler--chevron-right] accordion-item-active:rotate-90 size-5 shrink-0 transition-transform duration-300 rtl:rotate-180"></span>
                            {{ __('product_bp_norway.point.2.title') }}
                        </button>
                        <div id="bp-norway-kelebihan-collapse"
                             class="accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                             aria-labelledby="bp-norway-kelebihan"
                             role="region">
                            <div class="prose prose-sm md:prose-md w-full max-w-none pb-4">
                                {!! __('product_bp_norway.point.2.description') !!}
                                {{ __('product_bp_norway.point.2.info') }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CTA Button -->
                <div class="flex items-center justify-center pb-4 pt-3 sm:pt-4">
                    <a href="#"
                       class="btn btn-primary btn-sm sm:btn-lg w-full rounded-lg px-6 text-sm font-semibold shadow-lg transition-all duration-300 hover:shadow-xl sm:rounded-xl sm:px-8 sm:text-base">
                        {{ __('product_bp_norway.cta') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        const bpNorwaySlidesContainer = document.getElementById('bp-norway-slides-container');
        const bpNorwayPrevBtn = document.getElementById('bp-norway-prev-btn');
        const bpNorwayNextBtn = document.getElementById('bp-norway-next-btn');
        const bpNorwayDotsContainer = document.getElementById('bp-norway-dots-container');

        // Count actual slides from DOM
        const bpNorwaySlideElements = bpNorwaySlidesContainer.querySelectorAll(
            'div.relative.w-full.flex-shrink-0');
        const bpNorwaySlidesCount = bpNorwaySlideElements.length;

        let bpNorwayCurrentSlide = 0;
        let bpNorwayIsAutoPlaying = true;
        let bpNorwayAutoPlayInterval;

        // Touch/swipe variables
        let bpNorwayTouchStartX = 0;
        let bpNorwayTouchEndX = 0;
        let bpNorwayIsSwiping = false;

        // Create dots based on actual slide count
        for (let i = 0; i < bpNorwaySlidesCount; i++) {
            const dot = document.createElement('button');
            dot.className =
                `w-2 h-2 rounded-full transition-all duration-300 ${i === 0 ? 'bg-white w-6' : 'bg-white/50 hover:bg-white/75'}`;
            dot.setAttribute('aria-label', `Go to slide ${i + 1}`);
            dot.addEventListener('click', () => bpNorwayGoToSlide(i));
            bpNorwayDotsContainer.appendChild(dot);
        }

        const bpNorwayUpdateDots = () => {
            [...bpNorwayDotsContainer.children].forEach((dot, index) => {
                dot.className =
                    `w-2 h-2 rounded-full transition-all duration-300 ${index === bpNorwayCurrentSlide ? 'bg-white w-6' : 'bg-white/50 hover:bg-white/75'}`;
            });
        };

        const bpNorwayGoToSlide = index => {
            bpNorwayCurrentSlide = index;
            bpNorwaySlidesContainer.style.transform =
                `translateX(-${bpNorwayCurrentSlide * 100}%)`;
            bpNorwayUpdateDots();
            bpNorwayPauseAutoPlay();
        };

        const bpNorwayGoToPrevious = () => {
            bpNorwayCurrentSlide = (bpNorwayCurrentSlide - 1 +
                bpNorwaySlidesCount) % bpNorwaySlidesCount;
            bpNorwaySlidesContainer.style.transform =
                `translateX(-${bpNorwayCurrentSlide * 100}%)`;
            bpNorwayUpdateDots();
            bpNorwayPauseAutoPlay();
        };

        const bpNorwayGoToNext = () => {
            bpNorwayCurrentSlide = (bpNorwayCurrentSlide + 1) %
                bpNorwaySlidesCount;
            bpNorwaySlidesContainer.style.transform =
                `translateX(-${bpNorwayCurrentSlide * 100}%)`;
            bpNorwayUpdateDots();
            bpNorwayPauseAutoPlay();
        };

        const bpNorwayStartAutoPlay = () => {
            if (bpNorwayAutoPlayInterval) clearInterval(bpNorwayAutoPlayInterval);
            bpNorwayAutoPlayInterval = setInterval(() => {
                bpNorwayGoToNext();
            }, 5000);
        };

        const bpNorwayPauseAutoPlay = () => {
            bpNorwayIsAutoPlaying = false;
            clearInterval(bpNorwayAutoPlayInterval);
            setTimeout(() => {
                bpNorwayIsAutoPlaying = true;
                bpNorwayStartAutoPlay();
            }, 5000);
        };

        // Touch event handlers
        const bpNorwayHandleTouchStart = (e) => {
            bpNorwayTouchStartX = e.changedTouches[0].screenX;
            bpNorwayIsSwiping = true;
        };

        const bpNorwayHandleTouchEnd = (e) => {
            if (!bpNorwayIsSwiping) return;

            bpNorwayTouchEndX = e.changedTouches[0].screenX;
            const swipeDistance = bpNorwayTouchStartX - bpNorwayTouchEndX;
            const minSwipeDistance = 50;

            if (Math.abs(swipeDistance) > minSwipeDistance) {
                if (swipeDistance > 0) {
                    // Swipe left - next slide
                    bpNorwayGoToNext();
                } else {
                    // Swipe right - previous slide
                    bpNorwayGoToPrevious();
                }
            }

            bpNorwayIsSwiping = false;
        };

        // Add touch event listeners
        bpNorwaySlidesContainer.addEventListener('touchstart', bpNorwayHandleTouchStart, {
            passive: true
        });
        bpNorwaySlidesContainer.addEventListener('touchend', bpNorwayHandleTouchEnd, {
            passive: true
        });

        bpNorwayPrevBtn.addEventListener('click', bpNorwayGoToPrevious);
        bpNorwayNextBtn.addEventListener('click', bpNorwayGoToNext);

        bpNorwayStartAutoPlay();
    </script>
@endpush
