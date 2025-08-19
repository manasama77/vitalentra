<x-layouts.landing>
    <!-- Hero section -->
    <x-landing.hero />

    <!-- About section -->
    <x-landing.about loading="lazy" />

    <!-- Featured section -->
    <x-landing.featured loading="lazy" />

    <!-- Intro video section -->
    <x-landing.intro loading="lazy" />

    <!-- Call action section -->
    <x-landing.cta loading="lazy" />

    <!-- Product section -->
    <x-landing.product :carousels="$carousels" loading="lazy" />

    <!-- Team section -->
    <x-landing.team loading="lazy" />

    <!-- Testimonials section -->
    <x-landing.testimonial loading="lazy" />

    <!-- FAQ section -->
    <x-landing.faq loading="lazy" />

    <!-- Blog section -->
    <x-landing.blog :news="$news" loading="lazy" />

    <!-- Contact section -->
    <x-landing.contact loading="lazy" />

    <!-- Team Member Modals -->
    <x-landing.partials.modal_figure modalId="{{ Str::slug('Marida') }}"
                                     name="Marida"
                                     position="Chairman of the Board"
                                     photo="{{ Vite::asset('resources/images/Management - Marida.jpg') }}"
                                     content="{!! __('team.content.1') !!}" />

    <x-landing.partials.modal_figure modalId="{{ Str::slug('Beka Masinggil') }}"
                                     name="Beka Masinggil"
                                     position="{{ __('team.commissioner') }}"
                                     photo="{{ Vite::asset('resources/images/Management - Beka Masinggil.jpg') }}"
                                     content="{!! __('team.content.2') !!}" />

    <x-landing.partials.modal_figure modalId="{{ Str::slug('M. Nuzullaiman') }}"
                                     name="M. Nuzullaiman"
                                     position="Chief Executive Officer"
                                     photo="{{ Vite::asset('resources/images/Management - M. Nuzullaiman.jpg') }}"
                                     content="{!! __('team.content.3') !!}" />

    <x-landing.partials.modal_figure modalId="{{ Str::slug('Tito Masinggil') }}"
                                     name="Tito Masinggil"
                                     position="Chief Operating Officer"
                                     photo="{{ Vite::asset('resources/images/Management - Tito Masinggil.jpg') }}"
                                     content="{!! __('team.content.4') !!}" />

    <x-landing.partials.modal_figure modalId="{{ Str::slug('Renya Nuringtyas') }}"
                                     name="Renya Nuringtyas"
                                     position="Chief Marketing Officer"
                                     photo="{{ Vite::asset('resources/images/Management - Renya Nuringtyas.jpg') }}"
                                     content="{!! __('team.content.5') !!}" />
</x-layouts.landing>
