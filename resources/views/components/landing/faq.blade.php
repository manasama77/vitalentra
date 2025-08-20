<!-- FAQ section -->
<div id="faq" class="bg-base-100 py-12 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <!-- FAQ Header -->
        <div class="mb-8 text-center sm:mb-16 lg:mb-16">
            <h6 class="text-primary scroll-revealed mb-2 block text-lg font-semibold">
                {{ __('faq.title') }}
            </h6>
            <h2 class="text-base-content scroll-revealed mb-6 text-2xl md:text-4xl">
                {{ __('faq.sub_title') }}
            </h2>
        </div>

        <x-landing.partials.faq_accordion />
    </div>
</div>
