<section class="w-full">
    @include('partials.settings-heading')

    <x-settings.layout :heading="__('ui.Appearance')" :subheading="__('ui.Update the appearance settings for your account')">
        <div class="space-y-4">
            <div class="border-base-300 bg-base-100 rounded-lg border p-4">
                <h3 class="text-base-content mb-2 text-lg font-medium">{{ __('ui.Light') }} {{ __('ui.Theme') }}</h3>
                <p class="text-base-content text-sm opacity-70">
                    {{ __('ui.This application uses a custom light theme optimized for your experience.') }}</p>

                <div class="mt-4 flex items-center gap-3">
                    <div class="bg-primary text-primary-content flex h-8 w-8 items-center justify-center rounded-full">
                        <flux:icon.sun class="size-4" />
                    </div>
                    <span class="text-primary text-sm font-medium">{{ __('ui.Active') }}</span>
                </div>
            </div>
        </div>
    </x-settings.layout>
</section>
