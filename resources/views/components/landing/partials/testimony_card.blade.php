@props(['name', 'job', 'description', 'photo'])

<div class="swiper-slide">
    <div
         class="bg-body-light-1 shadow-card-2 min-h-70 flex flex-col items-start justify-between rounded-xl px-5 py-8 sm:px-8">
        <p class="text-body-light-11 mb-6 text-base">
            {{ $description }}
        </p>
        <figure class="flex items-center gap-4">
            <div class="size-22 overflow-hidden">
                <img src="{{ $photo }}"
                     alt="Testimonial picture"
                     class="h-full w-full rounded-full object-cover" />
            </div>
            <figcaption class="flex-grow">
                <h3 class="text-body-light-11 text-sm font-semibold">
                    {{ $name }}
                </h3>
                <p class="text-body-light-10 text-xs">
                    {{ $job }}
                </p>
            </figcaption>
        </figure>
    </div>
</div>
