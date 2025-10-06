 <section id="testimonials" class="section-area">
     <div class="container">
         <div class="scroll-revealed mx-auto mb-12 max-w-[550px] text-center">
             <h6 class="text-primary scroll-revealed mb-2 block text-lg font-semibold">
                 {{ __('testimony.title') }}
             </h6>
             <h2 class="text-base-content scroll-revealed mb-6 text-2xl md:text-4xl">
                 {{ __('testimony.sub_title') }}
             </h2>
         </div>

         <div class="scroll-revealed mb-12 h-full w-full">
             <div class="card shadow-card-2 rounded-xl">
                 <div class="card-body flex flex-col md:flex-row">
                     <div class="relative flex w-full items-center justify-center overflow-clip md:w-[45%]">
                         <img src="{{ Vite::asset('resources/images/Single Testimonials - Mario Irwinsyah.png') }}" alt="Mario Irwinsyah"
                             class="absolute top-0 w-[32%] object-cover" />
                     </div>
                     <div class="w-full md:w-[55%]">
                         <blockquote class="relative overflow-clip p-4">
                             <div class="absolute left-0 block h-full w-full md:hidden">
                                 <img src="{{ Vite::asset('resources/images/Single Testimonials - Mario Irwinsyah.png') }}" alt="Mario Irwinsyah"
                                     class="z-1 object-contain opacity-60" />
                             </div>

                             <span class="icon-[tabler--quote] text-base-200 z-1 absolute -start-3 -top-3 size-16 rotate-180 rtl:rotate-0"></span>

                             <div class="z-2 relative">
                                 <p class="text-base-content text-balance text-2xl leading-relaxed">
                                     <em>
                                         Sejak saya mengganti gula dengan pemanis alami Steffi, tubuh terasa jauh lebih ringan dan segar, terutama di
                                         pagi hari. Rasanya seperti punya energi baru tanpa harus takut kelebihan gula. Buat saya, ini bukan soal
                                         tren, tapi pilihan hidup
                                         yang lebih sehat — dan lewat Vitalentra Group International, saya ingin menginspirasi lebih banyak orang
                                         untuk mulai
                                         langkah kecil menuju hidup sehat tanpa gula.
                                     </em>
                                 </p>
                             </div>
                             <footer class="mt-4">
                                 <div class="text-base-content text-base font-semibold">~ Mario Irwinsyah, VGI Wellness Advocate</div>
                             </footer>
                         </blockquote>
                     </div>
                 </div>
             </div>
         </div>

         <div class="swiper testimonial-carousel common-carousel scroll-revealed">
             <div class="swiper-wrapper">
                 <x-landing.partials.testimony_card name="Teuku Wisnu" job="{{ __('testimony.user.1.job') }}" description="{!! __('testimony.user.1.description') !!}"
                     photo="{{ Vite::asset('resources/images/Testimonials - Teuku Wisnu.webp') }}" />

                 <x-landing.partials.testimony_card name="Irwansyah" job="{{ __('testimony.user.2.job') }}" description="{!! __('testimony.user.2.description') !!}"
                     photo="{{ Vite::asset('resources/images/Testimonials - Irwansyah.webp') }}" />

                 <x-landing.partials.testimony_card name="Mario Irwinsyah" job="{{ __('testimony.user.3.job') }}"
                     description="{!! __('testimony.user.3.description') !!}" photo="{{ Vite::asset('resources/images/Testimonials - Mario Irwinsyah.webp') }}" />

                 <x-landing.partials.testimony_card name="Citra Kirana" job="{{ __('testimony.user.4.job') }}" description="{!! __('testimony.user.4.description') !!}"
                     photo="{{ Vite::asset('resources/images/Testimonials - Citra Kirana.webp') }}" />

                 <x-landing.partials.testimony_card name="Natasha Rizky" job="{{ __('testimony.user.5.job') }}" description="{!! __('testimony.user.5.description') !!}"
                     photo="{{ Vite::asset('resources/images/Testimonials - Natasha Rizky.webp') }}" />
             </div>

             <div class="mb-5 mt-[60px] flex items-center justify-center gap-1">
                 <div class="swiper-button-prev">
                     <i class="fa fa-arrow-left"></i>
                 </div>
                 <div class="swiper-button-next">
                     <i class="fa fa-arrow-right"></i>
                 </div>
             </div>
         </div>
     </div>
 </section>

