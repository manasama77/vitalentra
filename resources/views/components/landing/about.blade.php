<!-- About section -->
<section id="about" class="section-area">
    <div class="container">
        <div class="grid grid-cols-1 gap-14 lg:grid-cols-2">
            <div class="w-full">
                <figure class="scroll-revealed mx-auto max-w-[480px]">
                    <img src="{{ Vite::asset('resources/images/tentang_kami_cover.jpg') }}"
                         alt="About image"
                         class="rounded-xl" />
                </figure>
            </div>

            <div class="w-full">
                <div class="scroll-revealed">
                    <h6 class="text-primary mb-2 block text-lg font-semibold">
                        {{ __('about.title') }}
                    </h6>
                    <h2 class="text-base-content mb-6">
                        {{ __('about.sub_title') }}
                    </h2>

                    <p class="text-base-content/80">
                        {{ __('about.content_1') }}
                    </p>
                    <p class="text-base-content/80">
                        {{ __('about.content_2') }}
                    </p>
                    <p class="text-base-content/80">
                        {{ __('about.content_3') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

