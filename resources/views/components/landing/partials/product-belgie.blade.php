<div id="belgie" class="card bg-base-100 overflow-hidden rounded-2xl shadow-xl transition-all duration-300">
    <div class="grid gap-8 px-8 pb-14 pt-8 lg:grid-cols-2">
        <!-- Product Images (Left) -->
        <div class="order-1">
            <div className="min-h-screen bg-slate-900 flex items-center justify-center p-4">
                <div class="relative mx-auto w-full max-w-7xl overflow-hidden rounded-xl">
                    <!-- Main carousel container -->
                    <div class="relative h-[50vh] overflow-hidden md:h-[70vh]">
                        <!-- Slides -->
                        <div id="belgie-slides-container"
                             class="flex h-full transition-transform duration-500 ease-in-out">
                            <div class="relative w-full flex-shrink-0">
                                <img src="{{ Vite::asset('resources/images/products/belgie/1.jpg') }}"
                                     alt="Belgie"
                                     class="h-full w-full object-cover">
                            </div>
                            <div class="relative w-full flex-shrink-0">
                                <img src="{{ Vite::asset('resources/images/products/belgie/2.jpg') }}"
                                     alt="Belgie"
                                     class="h-full w-full object-cover">
                            </div>
                            <div class="relative w-full flex-shrink-0">
                                <img src="{{ Vite::asset('resources/images/products/belgie/3.jpg') }}"
                                     alt="Belgie"
                                     class="h-full w-full object-cover">
                            </div>
                            <div class="relative w-full flex-shrink-0">
                                <img src="{{ Vite::asset('resources/images/products/belgie/4.jpg') }}"
                                     alt="Belgie"
                                     class="h-full w-full object-cover">
                            </div>
                            <div class="relative w-full flex-shrink-0">
                                <img src="{{ Vite::asset('resources/images/products/belgie/5.jpg') }}"
                                     alt="Belgie"
                                     class="h-full w-full object-cover">
                            </div>
                        </div>

                        <!-- Navigation buttons -->
                        <button id="belgie-prev-btn"
                                class="group absolute left-4 top-1/2 flex hidden h-12 w-12 -translate-y-1/2 items-center justify-center rounded-full bg-white/90 shadow-lg backdrop-blur-sm transition-all duration-200 hover:scale-110 hover:bg-white md:flex"
                                aria-label="Previous slide">
                            <i class="fas fa-chevron-left text-slate-700 group-hover:text-slate-900"></i>
                        </button>

                        <button id="belgie-next-btn"
                                class="group absolute right-4 top-1/2 flex hidden h-12 w-12 -translate-y-1/2 items-center justify-center rounded-full bg-white/90 shadow-lg backdrop-blur-sm transition-all duration-200 hover:scale-110 hover:bg-white md:flex"
                                aria-label="Next slide">
                            <i class="fas fa-chevron-right text-slate-700 group-hover:text-slate-900"></i>
                        </button>
                    </div>

                    <!-- Dot indicators -->
                    <div id="belgie-dots-container" class="absolute bottom-4 left-1/2 flex -translate-x-1/2 gap-2">
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Description (Right) -->
        <div class="order-2 space-y-1">
            <div>
                <h3 class="text-body-light-12 mb-4 text-3xl font-bold">Belgie - Perawatan Kulit Premium</h3>
                <p class="text-body-light-11 text-md leading-relaxed">
                    Belgie adalah rangkaian perawatan kulit mewah yang menggabungkan keahlian Eropa dengan bahan
                    berkualitas tinggi untuk menghasilkan kulit yang sehat dan bercahaya.
                </p>
                <p class="text-body-light-11 text-md leading-relaxed">
                    Setiap produk Belgie aman, halal, terdaftar BPOM, dan terjangkau, dirancang untuk menutrisi kulit
                    dari luar sekaligus menyegarkan dari dalam.
                </p>
            </div>

            <!-- Accordions -->
            <div class="accordion divide-neutral/20 divide-y">
                <div class="accordion-item" id="belgie-teknologi">
                    <button class="accordion-toggle inline-flex items-center gap-x-4 text-start"
                            aria-controls="belgie-teknologi-collapse"
                            aria-expanded="false">
                        <span
                              class="icon-[tabler--chevron-right] accordion-item-active:rotate-90 size-5 shrink-0 transition-transform duration-300 rtl:rotate-180"></span>
                        Teknologi & Bahan Aktif:
                    </button>
                    <div id="belgie-teknologi-collapse"
                         class="accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                         aria-labelledby="belgie-teknologi"
                         role="region">
                        <div class="w-full pb-4">
                            <p class="text-base-content/80 hyphens-auto break-words text-sm font-normal sm:text-base">
                                Mengandung Propolis, Hyaluronic Acid, dan Kolagen Hidrolisat—bahan aktif yang dikenal
                                mampu melembabkan, meregenerasi, dan meremajakan kulit.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item" id="belgie-rangkaian">
                    <button class="accordion-toggle inline-flex items-center gap-x-4 text-start"
                            aria-controls="belgie-rangkaian-collapse"
                            aria-expanded="false">
                        <span
                              class="icon-[tabler--chevron-right] accordion-item-active:rotate-90 size-5 shrink-0 transition-transform duration-300 rtl:rotate-180"></span>
                        Rangkaian Produk Belgie:
                    </button>
                    <div id="belgie-rangkaian-collapse"
                         class="accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                         aria-labelledby="belgie-rangkaian"
                         role="region">
                        <div class="accordion divide-neutral/20 divide-y ps-6">

                            <div class="accordion-item" id="belgie-facial-wash">
                                <button class="accordion-toggle inline-flex items-center gap-x-4 text-start"
                                        aria-controls="belgie-facial-wash-collapse"
                                        aria-expanded="false">
                                    <span
                                          class="icon-[tabler--chevron-right] accordion-item-active:rotate-90 size-5 shrink-0 transition-transform duration-300 rtl:rotate-180"></span>
                                    Belgie Facial Wash
                                </button>
                                <div id="belgie-facial-wash-collapse"
                                     class="accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                                     aria-labelledby="belgie-facial-wash"
                                     role="region">
                                    <div class="px-5 pb-4">
                                        <p
                                           class="text-base-content/80 hyphens-auto break-words text-sm font-normal sm:text-base">
                                            <b>Belgie Facial Wash</b> Pembersih wajah yang mencerahkan, diperkaya dengan
                                            Ekstrak Propolis dan Kolagen Terhidrolisis. Sabun wajah ini secara lembut
                                            mengangkat kotoran, menghaluskan garis halus, dan membantu menampilkan kulit
                                            yang segar dan sehat.
                                        </p>
                                    </div>
                                    <div class="px-5 pb-4">
                                        <ul
                                            class="text-base-content/80 list-disc space-y-1 break-words pl-4 text-sm font-normal sm:space-y-2 sm:text-base">
                                            <li>Membersihkan dan menyegarkan dengan lembut</li>
                                            <li>Mengurangi tanda-tanda penuaan</li>
                                            <li>Menjaga kesehatan kulit</li>
                                            <li>Bersertifikat Halal MUI & BPOM</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item" id="belgie-face-serum">
                                <button class="accordion-toggle inline-flex items-center gap-x-4 text-start"
                                        aria-controls="belgie-face-serum-collapse"
                                        aria-expanded="false">
                                    <span
                                          class="icon-[tabler--chevron-right] accordion-item-active:rotate-90 size-5 shrink-0 transition-transform duration-300 rtl:rotate-180"></span>
                                    Belgie Face Serum
                                </button>
                                <div id="belgie-face-serum-collapse"
                                     class="accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                                     aria-labelledby="belgie-face-serum"
                                     role="region">
                                    <div class="px-5 pb-4">
                                        <p
                                           class="text-base-content/80 hyphens-auto break-words text-sm font-normal sm:text-base">
                                            Serum anti-aging ini menggabungkan Propolis, Palmitoyl Tripeptide-5, dan
                                            Kolagen untuk mengencangkan kulit, merangsang regenerasi, dan menciptakan
                                            tampilan wajah yang cerah serta awet muda.
                                        </p>
                                    </div>
                                    <div class="px-5 pb-4">
                                        <ul
                                            class="text-base-content/80 list-disc space-y-1 break-words pl-4 text-sm font-normal sm:space-y-2 sm:text-base">
                                            <li>Mengencangkan dan menghaluskan kulit</li>
                                            <li>Meningkatkan kilau alami</li>
                                            <li>Meregenerasi sel-sel kulit</li>
                                            <li>Kualitas Eropa, Bersertifikat Halal & BPOM</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item" id="belgie-night-cream">
                                <button class="accordion-toggle inline-flex items-center gap-x-4 text-start"
                                        aria-controls="belgie-night-cream-collapse"
                                        aria-expanded="false">
                                    <span
                                          class="icon-[tabler--chevron-right] accordion-item-active:rotate-90 size-5 shrink-0 transition-transform duration-300 rtl:rotate-180"></span>
                                    Belgie Night Cream
                                </button>
                                <div id="belgie-night-cream-collapse"
                                     class="accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                                     aria-labelledby="belgie-night-cream"
                                     role="region">
                                    <div class="px-5 pb-4">
                                        <p
                                           class="text-base-content/80 hyphens-auto break-words text-sm font-normal sm:text-base">
                                            Krim malam ini diformulasikan dengan Ekstrak Propolis, Kolagen
                                            Terhidrolisis, Palmitoyl Tripeptide-5, dan Asam Hialuronat untuk memberikan
                                            nutrisi mendalam, membantu memudarkan noda hitam, dan melembabkan kulit
                                            sepanjang malam.
                                        </p>
                                    </div>
                                    <div class="px-5 pb-4">
                                        <ul
                                            class="text-base-content/80 list-disc space-y-1 break-words pl-4 text-sm font-normal sm:space-y-2 sm:text-base">
                                            <li>Mengurangi perubahan warna kulit</li>
                                            <li>Melembabkan dan menghaluskan secara mendalam</li>
                                            <li>Mendukung proses perbaikan kulit saat tidur</li>
                                            <li>Bersertifikat Halal & BPOM</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item" id="belgie-day-cream">
                                <button class="accordion-toggle inline-flex items-center gap-x-4 text-start"
                                        aria-controls="belgie-day-cream-collapse"
                                        aria-expanded="false">
                                    <span
                                          class="icon-[tabler--chevron-right] accordion-item-active:rotate-90 size-5 shrink-0 transition-transform duration-300 rtl:rotate-180"></span>
                                    Belgie Day Cream
                                </button>
                                <div id="belgie-day-cream-collapse"
                                     class="accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                                     aria-labelledby="belgie-day-cream"
                                     role="region">
                                    <div class="px-5 pb-4">
                                        <p
                                           class="text-base-content/80 hyphens-auto break-words text-sm font-normal sm:text-base">
                                            Krim siang yang ringan ini mengandalkan tiga bahan aktif utama yang bekerja
                                            sama melindungi dan menutrisi kulit sepanjang hari, serta memberikan
                                            tampilan cerah dan awet muda. Propolis yang kaya antioksidan membantu
                                            mengurangi tanda penuaan dini, melembapkan, dan menenangkan kulit
                                            berjerawat.
                                        </p>
                                        <p
                                           class="text-base-content/80 hyphens-auto break-words text-sm font-normal sm:text-base">
                                            Titanium Dioksida melindungi dari sinar matahari, mencerahkan noda gelap,
                                            dan menjaga kelembutan kulit. Ethylhexyl Methoxycinnamate menambah lapisan
                                            perlindungan dengan menangkal sinar UV berbahaya dan mencegah penuaan dini.
                                        </p>
                                    </div>
                                    <div class="px-5 pb-4">
                                        <ul
                                            class="text-base-content/80 list-disc space-y-1 break-words pl-4 text-sm font-normal sm:space-y-2 sm:text-base">
                                            <li>Melindungi kulit dari paparan sinar matahari setiap hari</li>
                                            <li>Menjaga kilau alami kulit</li>
                                            <li>Kaya hidrasi dan antioksidan</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item" id="belgie-hair-tonic">
                                <button class="accordion-toggle inline-flex items-center gap-x-4 text-start"
                                        aria-controls="belgie-hair-tonic-collapse"
                                        aria-expanded="false">
                                    <span
                                          class="icon-[tabler--chevron-right] accordion-item-active:rotate-90 size-5 shrink-0 transition-transform duration-300 rtl:rotate-180"></span>
                                    Belgie Hair Tonic
                                </button>
                                <div id="belgie-hair-tonic-collapse"
                                     class="accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                                     aria-labelledby="belgie-hair-tonic"
                                     role="region">
                                    <div class="px-5 pb-4">
                                        <p
                                           class="text-base-content/80 hyphens-auto break-words text-sm font-normal sm:text-base">
                                            membantu mengatasi kerontokan, menumbuhkan rambut lebih tebal, dan menjaga
                                            kesehatan kulit kepala. Selain itu, produk ini diformulasikan dengan
                                            bahan-bahan alami dan diklaim aman karena sudah terdaftar di BPOM.
                                        </p>
                                        <p
                                           class="text-base-content/80 hyphens-auto break-words text-sm font-normal sm:text-base">
                                            Berikut adalah beberapa kelebihan Belgie Hair Tonic secara lebih detail:
                                        </p>
                                    </div>
                                    <div class="px-5 pb-4">
                                        <ul
                                            class="text-base-content/80 list-disc space-y-1 break-words pl-4 text-sm font-normal sm:space-y-2 sm:text-base">
                                            <li>Mengatasi rambut rontok</li>
                                            <li>Merangsang pertumbuhan rambut baru</li>
                                            <li>Memperkuat rambut</li>
                                            <li>Menjaga kesehatan kulit kepala</li>
                                            <li>Mengandung bahan alami</li>
                                            <li>Terdaftar BPOM</li>
                                            <li>Mudah digunakan</li>
                                        </ul>
                                    </div>
                                    <div class="px-5 pb-4">
                                        <p
                                           class="text-base-content/80 hyphens-auto break-words text-sm font-normal sm:text-base">
                                            Dengan berbagai kelebihan tersebut, Belgie Hair Tonic menjadi pilihan yang
                                            baik untuk mengatasi masalah rambut dan menjaga kesehatan rambut secara
                                            keseluruhan.
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="mt-4 w-full pb-4">
                        <p class="text-base-content/80 hyphens-auto break-words text-sm font-normal sm:text-base">
                            <b>Belgie</b> - Kulit Cantik Natural dengan Sentuhan Eropa
                            Tampilkan versi terbaik dari kulit Anda dengan perawatan kulit yang aman, ilmiah, dan
                            efektif.

                        </p>
                    </div>
                </div>

            </div>

            <!-- CTA Button -->
            <div class="flex items-center justify-center pb-4 pt-3 sm:pt-4">
                <a href="#"
                   class="btn btn-primary btn-sm sm:btn-lg w-full rounded-lg px-6 text-sm font-semibold shadow-lg transition-all duration-300 hover:shadow-xl sm:rounded-xl sm:px-8 sm:text-base">
                    Pesan Sekarang
                </a>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        const belgieSlidesContainer = document.getElementById('belgie-slides-container');
        const belgiePrevBtn = document.getElementById('belgie-prev-btn');
        const belgieNextBtn = document.getElementById('belgie-next-btn');
        const belgieDotsContainer = document.getElementById('belgie-dots-container');

        // Count actual slides from DOM
        const belgieSlideElements = belgieSlidesContainer.querySelectorAll('div.relative.w-full.flex-shrink-0');
        const belgieSlidesCount = belgieSlideElements.length;

        let belgieCurrentSlide = 0;
        let belgieIsAutoPlaying = true;
        let belgieAutoPlayInterval;

        // Touch/swipe variables
        let belgieTouchStartX = 0;
        let belgieTouchEndX = 0;
        let belgieIsSwiping = false;

        // Create dots based on actual slide count
        for (let i = 0; i < belgieSlidesCount; i++) {
            const dot = document.createElement('button');
            dot.className =
                `w-2 h-2 rounded-full transition-all duration-300 ${i === 0 ? 'bg-white w-6' : 'bg-white/50 hover:bg-white/75'}`;
            dot.setAttribute('aria-label', `Go to slide ${i + 1}`);
            dot.addEventListener('click', () => belgieGoToSlide(i));
            belgieDotsContainer.appendChild(dot);
        }

        const belgieUpdateDots = () => {
            [...belgieDotsContainer.children].forEach((dot, index) => {
                dot.className =
                    `w-2 h-2 rounded-full transition-all duration-300 ${index === belgieCurrentSlide ? 'bg-white w-6' : 'bg-white/50 hover:bg-white/75'}`;
            });
        };

        const belgieGoToSlide = index => {
            belgieCurrentSlide = index;
            belgieSlidesContainer.style.transform = `translateX(-${belgieCurrentSlide * 100}%)`;
            belgieUpdateDots();
            belgiePauseAutoPlay();
        };

        const belgieGoToPrevious = () => {
            belgieCurrentSlide = (belgieCurrentSlide - 1 + belgieSlidesCount) % belgieSlidesCount;
            belgieSlidesContainer.style.transform = `translateX(-${belgieCurrentSlide * 100}%)`;
            belgieUpdateDots();
            belgiePauseAutoPlay();
        };

        const belgieGoToNext = () => {
            belgieCurrentSlide = (belgieCurrentSlide + 1) % belgieSlidesCount;
            belgieSlidesContainer.style.transform = `translateX(-${belgieCurrentSlide * 100}%)`;
            belgieUpdateDots();
            belgiePauseAutoPlay();
        };

        const belgieStartAutoPlay = () => {
            if (belgieAutoPlayInterval) clearInterval(belgieAutoPlayInterval);
            belgieAutoPlayInterval = setInterval(() => {
                belgieGoToNext();
            }, 5000);
        };

        const belgiePauseAutoPlay = () => {
            belgieIsAutoPlaying = false;
            clearInterval(belgieAutoPlayInterval);
            setTimeout(() => {
                belgieIsAutoPlaying = true;
                belgieStartAutoPlay();
            }, 5000);
        };

        // Touch event handlers
        const belgieHandleTouchStart = (e) => {
            belgieTouchStartX = e.changedTouches[0].screenX;
            belgieIsSwiping = true;
        };

        const belgieHandleTouchEnd = (e) => {
            if (!belgieIsSwiping) return;

            belgieTouchEndX = e.changedTouches[0].screenX;
            const swipeDistance = belgieTouchStartX - belgieTouchEndX;
            const minSwipeDistance = 50;

            if (Math.abs(swipeDistance) > minSwipeDistance) {
                if (swipeDistance > 0) {
                    // Swipe left - next slide
                    belgieGoToNext();
                } else {
                    // Swipe right - previous slide
                    belgieGoToPrevious();
                }
            }

            belgieIsSwiping = false;
        };

        // Add touch event listeners
        belgieSlidesContainer.addEventListener('touchstart', belgieHandleTouchStart, {
            passive: true
        });
        belgieSlidesContainer.addEventListener('touchend', belgieHandleTouchEnd, {
            passive: true
        });

        belgiePrevBtn.addEventListener('click', belgieGoToPrevious);
        belgieNextBtn.addEventListener('click', belgieGoToNext);

        belgieStartAutoPlay();
    </script>
@endpush

