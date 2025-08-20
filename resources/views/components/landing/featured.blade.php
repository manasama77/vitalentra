<!-- Featured section -->
<section id="featured" class="section-area">
    <div class="container">
        <div class="scroll-revealed mx-auto mb-12 text-center md:max-w-[900px]">
            {{-- <h6 class="text-primary mb-2 block text-lg font-semibold"> --}}
            <h6 class="text-primary scroll-revealed mb-2 block text-lg font-semibold">
                {{ __('featured.title') }}
            </h6>
            {{-- <h2 class="text-base-content mb-6"> --}}
            <h2 class="text-base-content scroll-revealed mb-6 text-3xl leading-tight md:text-4xl">
                {{ __('featured.sub_title') }}
            </h2>
            <p>
                {{ __('featured.content_1') }}
            </p>
        </div>

        <div class="row">
            <div class="scroll-revealed col-12 sm:col-6 lg:col-4">
                <div class="group hover:-translate-y-1">
                    <div
                         class="bg-primary text-primary-color mb-6 flex h-[70px] w-[70px] items-center justify-center rounded-2xl text-[37px]/none">
                        <i class="fa-solid fa-leaf"></i>
                    </div>
                    <div class="w-full">
                        <h4 class="text-base-content mb-5 text-[1.25rem]/tight font-semibold">
                            {{ __('featured.point_1.title') }}
                        </h4>
                        <p>
                            {{ __('featured.point_1.description') }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="scroll-revealed col-12 sm:col-6 lg:col-4">
                <div class="group hover:-translate-y-1">
                    <div
                         class="bg-primary text-primary-color mb-6 flex h-[70px] w-[70px] items-center justify-center rounded-2xl text-[37px]/none">
                        <img src="{{ Vite::asset('resources/images/Halal_Indonesia.svg') }}"
                             alt="Halal"
                             class="w-[45%]" />
                    </div>
                    <div class="w-full">
                        <h4 class="text-base-content mb-5 text-[1.25rem]/tight font-semibold">
                            {{ __('featured.point_2.title') }}
                        </h4>
                        <p>
                            {{ __('featured.point_2.description') }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="scroll-revealed col-12 sm:col-6 lg:col-4">
                <div class="group hover:-translate-y-1">
                    <div
                         class="bg-primary text-primary-color mb-6 flex h-[70px] w-[70px] items-center justify-center rounded-2xl text-[37px]/none">
                        <i class="fa-solid fa-users"></i>
                    </div>
                    <div class="w-full">
                        <h4 class="text-base-content mb-5 text-[1.25rem]/tight font-semibold">
                            {{ __('featured.point_3.title') }}
                        </h4>
                        <p>
                            {{ __('featured.point_3.description') }}
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

