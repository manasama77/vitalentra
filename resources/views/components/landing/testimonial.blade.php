 <section id="testimonials" class="section-area">
     <div class="container">
         <div class="scroll-revealed mx-auto mb-12 max-w-[550px] text-center">
             <h6 class="text-primary mb-2 block text-lg font-semibold">
                 {{ __('testimony.title') }}
             </h6>
             <h2 class="mb-6">
                 {{ __('testimony.sub_title') }}
             </h2>
         </div>

         <div class="swiper testimonial-carousel common-carousel scroll-revealed">
             <div class="swiper-wrapper">
                 <x-landing.partials.testimony_card name="Teuku Wisnu"
                                                    job="{{ __('testimony.user.1.job') }}"
                                                    description="{{ __('testimony.user.1.description') }}"
                                                    photo="{{ Vite::asset('resources/images/Testimonials - Teuku Wisnu.jpg') }}" />

                 <x-landing.partials.testimony_card name="Irwansyah"
                                                    job="{{ __('testimony.user.2.job') }}"
                                                    description="{{ __('testimony.user.2.description') }}"
                                                    photo="{{ Vite::asset('resources/images/Testimonials - Irwansyah.jpg') }}" />

                 <x-landing.partials.testimony_card name="Mario Irwinsyah"
                                                    job="{{ __('testimony.user.3.job') }}"
                                                    description="{{ __('testimony.user.3.description') }}"
                                                    photo="{{ Vite::asset('resources/images/Testimonials - Mario Irwinsyah.jpg') }}" />

                 <x-landing.partials.testimony_card name="Citra Kirana"
                                                    job="{{ __('testimony.user.4.job') }}"
                                                    description="{{ __('testimony.user.4.description') }}"
                                                    photo="{{ Vite::asset('resources/images/Testimonials - Citra Kirana.jpg') }}" />

                 <x-landing.partials.testimony_card name="Natasha Rizky"
                                                    job="{{ __('testimony.user.5.job') }}"
                                                    description="{{ __('testimony.user.5.description') }}"
                                                    photo="{{ Vite::asset('resources/images/Testimonials - Natasha Rizky.jpg') }}" />
             </div>

             <div class="mb-5 mt-[60px] flex items-center justify-center gap-1">
                 <div class="swiper-button-prev">
                     <i class="lni lni-arrow-left"></i>
                 </div>
                 <div class="swiper-button-next">
                     <i class="lni lni-arrow-right"></i>
                 </div>
             </div>
         </div>
     </div>
 </section>
