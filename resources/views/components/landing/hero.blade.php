<div id="carousel"
     data-carousel='{
        "loadingClasses": "opacity-0",
        "isInfiniteLoop": true,
        "isAutoPlay": true,
        "speed": 5000
     }'
     class="relative w-full">
    <div class="carousel h-screen rounded-none">
        <div class="carousel-body h-full opacity-0">
            @foreach ($carousels as $carousel)
                <div class="carousel-slide">
                    <div class="flex h-full justify-center">
                        <img src="{{ asset($carousel->image) }}"
                             class="size-full object-cover"
                             alt="{{ $carousel->title }}"
                             loading="lazy" />
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Previous Slide -->
    <button type="button"
            class="carousel-prev carousel-disabled:opacity-50 size-9.5 bg-base-100 start-5 flex items-center justify-center rounded-full shadow-sm max-sm:start-3">
        <i class="fas fa-chevron-left cursor-pointer text-lg"></i>
        <span class="sr-only">Previous</span>
    </button>
    <!-- Next Slide -->
    <button type="button"
            class="carousel-next carousel-disabled:opacity-50 size-9.5 bg-base-100 end-5 flex items-center justify-center rounded-full shadow-sm max-sm:end-3">
        <i class="fas fa-chevron-right cursor-pointer text-lg"></i>
        <span class="sr-only">Next</span>
    </button>
</div>

