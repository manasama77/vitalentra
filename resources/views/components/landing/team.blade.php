<!-- Team section -->
<section id="team" class="section-area">
    <div class="container">
        <div class="scroll-revealed mx-auto mb-12 max-w-[700px] text-center">
            <h6 class="text-primary mb-2 block text-lg font-semibold">
                {{ __('team.title') }}
            </h6>
            <h2 class="text-base-content mb-6">
                {{ __('team.sub_title') }}
            </h2>
            <p>
                {{ __('team.description') }}
            </p>
        </div>

        <!-- All Team Members -->
        <div class="grid grid-cols-1 gap-8 md:grid-cols-5">
            <div class="scroll-revealed mx-auto w-full max-w-[300px]">
                <x-landing.partials.figure photo="{{ Vite::asset('resources/images/Management - Marida.jpg') }}"
                                           name="Marida"
                                           position="Chairman of the Board"
                                           triggerId="{{ Str::slug('Marida') }}"
                                           contentKey="1" />
            </div>

            <div class="scroll-revealed mx-auto w-full max-w-[300px]">
                <x-landing.partials.figure photo="{{ Vite::asset('resources/images/Management - Beka Masinggil.jpg') }}"
                                           name="Beka Masinggil"
                                           position="Komisaris"
                                           triggerId="{{ Str::slug('Beka Masinggil') }}"
                                           contentKey="2" />
            </div>

            <div class="scroll-revealed mx-auto w-full max-w-[300px]">
                <x-landing.partials.figure photo="{{ Vite::asset('resources/images/Management - M. Nuzullaiman.jpg') }}"
                                           name="M. Nuzullaiman"
                                           position="Chief Executive Officer"
                                           triggerId="{{ Str::slug('M. Nuzullaiman') }}"
                                           contentKey="3" />
            </div>

            <div class="scroll-revealed mx-auto w-full max-w-[300px]">
                <x-landing.partials.figure photo="{{ Vite::asset('resources/images/Management - Tito Masinggil.jpg') }}"
                                           name="Tito Masinggil"
                                           position="Chief Operating Officer"
                                           triggerId="{{ Str::slug('Tito Masinggil') }}"
                                           contentKey="4" />
            </div>

            <div class="scroll-revealed mx-auto w-full max-w-[300px]">
                <x-landing.partials.figure photo="{{ Vite::asset('resources/images/Management - Renya Nuringtyas.jpg') }}"
                                           name="Renya Nuringtyas"
                                           position="Chief Marketing Officer"
                                           triggerId="{{ Str::slug('Renya Nuringtyas') }}"
                                           contentKey="5" />
            </div>
        </div>

    </div>
</section>

