<div id="steffi" class="card bg-base-100 scroll-revealed rounded-2xl shadow-xl">
    <div class="card-body">
        <div class="grid w-full gap-6 sm:gap-8 lg:grid-cols-2">
            <div class="order-1 lg:order-1">
                <div className="min-h-screen bg-slate-900 flex items-center justify-center p-4">
                    <div class="relative mx-auto w-full max-w-7xl overflow-hidden rounded-xl">
                        <!-- Main carousel container -->
                        <div class="relative h-[50vh] overflow-hidden md:h-[70vh]">
                            <!-- Slides -->
                            <div id="steffi-slides-container"
                                 class="flex h-full transition-transform duration-500 ease-in-out">
                                <div class="relative w-full flex-shrink-0">
                                    <img src="{{ Vite::asset('resources/images/products/steffi/1.jpg') }}"
                                         alt="Modern Architecture"
                                         class="h-full w-full object-cover">
                                </div>
                                <div class="relative w-full flex-shrink-0">
                                    <img src="{{ Vite::asset('resources/images/products/steffi/2.jpg') }}"
                                         alt="Nature Landscape"
                                         class="h-full w-full object-cover">
                                </div>
                                <div class="relative w-full flex-shrink-0">
                                    <img src="{{ Vite::asset('resources/images/products/steffi/3.jpg') }}"
                                         alt="City Skyline"
                                         class="h-full w-full object-cover">
                                </div>
                            </div>

                            <!-- Navigation buttons -->
                            <button id="steffi-prev-btn"
                                    class="group absolute left-4 top-1/2 flex hidden h-12 w-12 -translate-y-1/2 items-center justify-center rounded-full bg-white/90 shadow-lg backdrop-blur-sm transition-all duration-200 hover:scale-110 hover:bg-white md:flex"
                                    aria-label="Previous slide">
                                <i class="fas fa-chevron-left text-slate-700 group-hover:text-slate-900"></i>
                            </button>

                            <button id="steffi-next-btn"
                                    class="group absolute right-4 top-1/2 flex hidden h-12 w-12 -translate-y-1/2 items-center justify-center rounded-full bg-white/90 shadow-lg backdrop-blur-sm transition-all duration-200 hover:scale-110 hover:bg-white md:flex"
                                    aria-label="Next slide">
                                <i class="fas fa-chevron-right text-slate-700 group-hover:text-slate-900"></i>
                            </button>
                        </div>

                        <!-- Dot indicators -->
                        <div id="steffi-dots-container" class="absolute bottom-4 left-1/2 flex -translate-x-1/2 gap-2">
                        </div>
                    </div>
                </div>
            </div>

            <div class="order-2 w-full min-w-0 space-y-4 overflow-hidden sm:space-y-6 lg:order-2">

                <div class="w-full">
                    <h3 class="text-body-light-12 mb-3 break-words text-2xl font-bold sm:mb-4 sm:text-3xl">
                        {{ __('product_steffi.title') }}
                    </h3>
                    <p class="text-body-light-11 hyphens-auto break-words text-sm leading-relaxed sm:text-base">
                        {{ __('product_steffi.description') }}
                    </p>
                </div>

                <!-- Accordions -->
                <div class="accordion divide-neutral/20 w-full divide-y">

                    <div class="accordion-item w-full" id="steffi-keunggulan-utama-arrow">
                        <button class="accordion-toggle inline-flex w-full items-center gap-x-4 pl-0 text-start"
                                aria-controls="steffi-keunggulan-utama-arrow-collapse"
                                aria-expanded="false">
                            <span
                                  class="icon-[tabler--chevron-right] accordion-item-active:rotate-90 size-4 shrink-0 transition-transform duration-300 sm:size-5 rtl:rotate-180"></span>
                            <span class="break-words">
                                {{ __('product_steffi.point.1.title') }}
                            </span>
                        </button>
                        <div id="steffi-keunggulan-utama-arrow-collapse"
                             class="accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                             aria-labelledby="steffi-keunggulan-utama-arrow"
                             role="region">
                            <div class="prose prose:sm md:prose-md w-full max-w-none pb-4">
                                {!! __('product_steffi.point.1.description') !!}
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item w-full" id="steffi-manfaat-kesehatan-arrow">
                        <button class="accordion-toggle inline-flex w-full items-center gap-x-4 pl-0 text-start"
                                aria-controls="steffi-manfaat-kesehatan-arrow-collapse"
                                aria-expanded="false">
                            <span
                                  class="icon-[tabler--chevron-right] accordion-item-active:rotate-90 size-4 shrink-0 transition-transform duration-300 sm:size-5 rtl:rotate-180"></span>
                            <span class="break-words">
                                {{ __('product_steffi.point.2.title') }}
                            </span>
                        </button>
                        <div id="steffi-manfaat-kesehatan-arrow-collapse"
                             class="accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                             aria-labelledby="steffi-manfaat-kesehatan-arrow"
                             role="region">
                            <div class="w-full pb-4">
                                <p
                                   class="text-base-content/80 hyphens-auto break-words text-sm font-normal sm:text-base">
                                    {!! __('product_steffi.point.2.description') !!}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item w-full" id="steffi-aturan-pakai-arrow">
                        <button class="accordion-toggle inline-flex w-full items-center gap-x-4 pl-0 text-start"
                                aria-controls="steffi-aturan-pakai-arrow-collapse"
                                aria-expanded="false">
                            <span
                                  class="icon-[tabler--chevron-right] accordion-item-active:rotate-90 size-4 shrink-0 transition-transform duration-300 sm:size-5 rtl:rotate-180"></span>
                            <span class="break-words">
                                {{ __('product_steffi.point.3.title') }}
                            </span>
                        </button>
                        <div id="steffi-aturan-pakai-arrow-collapse"
                             class="accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                             aria-labelledby="steffi-aturan-pakai-arrow"
                             role="region">
                            <div class="w-full pb-4">
                                <p
                                   class="text-base-content/80 hyphens-auto break-words text-sm font-normal sm:text-base">
                                    {!! __('product_steffi.point.3.description') !!}
                                </p>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- CTA Button -->
                <div class="flex items-center justify-center pb-4 pt-3 sm:pt-4">
                    <a href="#"
                       class="btn btn-primary btn-sm sm:btn-lg w-full rounded-lg px-6 text-sm font-semibold shadow-lg transition-all duration-300 hover:shadow-xl sm:rounded-xl sm:px-8 sm:text-base">
                        {{ __('product_steffi.cta') }}
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        const steffiSlidesContainer = document.getElementById('steffi-slides-container');
        const steffiPrevBtn = document.getElementById('steffi-prev-btn');
        const steffiNextBtn = document.getElementById('steffi-next-btn');
        const steffiDotsContainer = document.getElementById('steffi-dots-container');

        // Count actual slides from DOM
        const steffiSlideElements = steffiSlidesContainer.querySelectorAll('div.relative.w-full.flex-shrink-0');
        const steffiSlidesCount = steffiSlideElements.length;

        let steffiCurrentSlide = 0;
        let steffiIsAutoPlaying = true;
        let steffiAutoPlayInterval;

        // Touch/swipe variables
        let steffiTouchStartX = 0;
        let steffiTouchEndX = 0;
        let steffiIsSwiping = false;

        // Create dots based on actual slide count
        for (let i = 0; i < steffiSlidesCount; i++) {
            const dot = document.createElement('button');
            dot.className =
                `w-2 h-2 rounded-full transition-all duration-300 ${i === 0 ? 'bg-white w-6' : 'bg-white/50 hover:bg-white/75'}`;
            dot.setAttribute('aria-label', `Go to slide ${i + 1}`);
            dot.addEventListener('click', () => steffiGoToSlide(i));
            steffiDotsContainer.appendChild(dot);
        }

        const steffiUpdateDots = () => {
            [...steffiDotsContainer.children].forEach((dot, index) => {
                dot.className =
                    `w-2 h-2 rounded-full transition-all duration-300 ${index === steffiCurrentSlide ? 'bg-white w-6' : 'bg-white/50 hover:bg-white/75'}`;
            });
        };

        const steffiGoToSlide = index => {
            steffiCurrentSlide = index;
            steffiSlidesContainer.style.transform = `translateX(-${steffiCurrentSlide * 100}%)`;
            steffiUpdateDots();
            steffiPauseAutoPlay();
        };

        const steffiGoToPrevious = () => {
            steffiCurrentSlide = (steffiCurrentSlide - 1 + steffiSlidesCount) % steffiSlidesCount;
            steffiSlidesContainer.style.transform = `translateX(-${steffiCurrentSlide * 100}%)`;
            steffiUpdateDots();
            steffiPauseAutoPlay();
        };

        const steffiGoToNext = () => {
            steffiCurrentSlide = (steffiCurrentSlide + 1) % steffiSlidesCount;
            steffiSlidesContainer.style.transform = `translateX(-${steffiCurrentSlide * 100}%)`;
            steffiUpdateDots();
            steffiPauseAutoPlay();
        };

        const steffiStartAutoPlay = () => {
            if (steffiAutoPlayInterval) clearInterval(steffiAutoPlayInterval);
            steffiAutoPlayInterval = setInterval(() => {
                steffiGoToNext();
            }, 5000);
        };

        const steffiPauseAutoPlay = () => {
            steffiIsAutoPlaying = false;
            clearInterval(steffiAutoPlayInterval);
            setTimeout(() => {
                steffiIsAutoPlaying = true;
                steffiStartAutoPlay();
            }, 5000);
        };

        // Touch event handlers
        const steffiHandleTouchStart = (e) => {
            steffiTouchStartX = e.changedTouches[0].screenX;
            steffiIsSwiping = true;
        };

        const steffiHandleTouchEnd = (e) => {
            if (!steffiIsSwiping) return;

            steffiTouchEndX = e.changedTouches[0].screenX;
            const swipeDistance = steffiTouchStartX - steffiTouchEndX;
            const minSwipeDistance = 50;

            if (Math.abs(swipeDistance) > minSwipeDistance) {
                if (swipeDistance > 0) {
                    // Swipe left - next slide
                    steffiGoToNext();
                } else {
                    // Swipe right - previous slide
                    steffiGoToPrevious();
                }
            }

            steffiIsSwiping = false;
        };

        // Add touch event listeners
        steffiSlidesContainer.addEventListener('touchstart', steffiHandleTouchStart, {
            passive: true
        });
        steffiSlidesContainer.addEventListener('touchend', steffiHandleTouchEnd, {
            passive: true
        });

        steffiPrevBtn.addEventListener('click', steffiGoToPrevious);
        steffiNextBtn.addEventListener('click', steffiGoToNext);

        steffiStartAutoPlay();
    </script>
@endpush

