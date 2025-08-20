<!-- About section -->
<section id="about" class="section-area mx-auto w-full px-4 py-16 md:px-6 md:py-24 lg:px-8">
    <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-14 lg:grid-cols-2">
            <div class="w-full">
                <figure class="scroll-revealed mx-auto">
                    <img src="{{ Vite::asset('resources/images/tentang_kami_cover.jpg') }}"
                         alt="About image"
                         class="rounded-xl" />
                </figure>
            </div>

            <div class="w-full">
                <div class="scroll-revealed">
                    <h6 class="text-primary scroll-revealed mb-2 block text-lg font-semibold">
                        {{ __('about.title') }}
                    </h6>
                    <h2 class="text-base-content scroll-revealed mb-6 text-3xl leading-tight md:text-4xl">
                        {{ __('about.sub_title') }}
                    </h2>

                    <p class="text-base-content">
                        {{ __('about.content_1') }}
                    </p>
                    <p class="text-base-content">
                        {{ __('about.content_2') }}
                    </p>
                    <p class="text-base-content">
                        {{ __('about.content_3') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
