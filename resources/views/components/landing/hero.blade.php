<div id="carousel"
     data-carousel='{
        "loadingClasses": "opacity-0",
        "isInfiniteLoop": true,
        "isAutoPlay": true,
        "speed": 5000
     }'
     class="relative w-full">
    <div class="carousel h-screen rounded-none">
        <div class="carousel-body h-full opacity-0 transition-all duration-500 ease-in-out">
            @foreach ($carousels as $carousel)
                <div class="carousel-slide">
                    <div class="flex size-full justify-center">
                        <picture class="size-full object-cover">
                            @if (!empty($carousel->image_480))
                                <source srcset="{{ asset($carousel->image_480) }}" media="(max-width: 480px)">
                            @endif
                            @if (!empty($carousel->image_768))
                                <source srcset="{{ asset($carousel->image_768) }}" media="(max-width: 768px)">
                            @endif
                            @if (!empty($carousel->image_1024))
                                <source srcset="{{ asset($carousel->image_1024) }}" media="(max-width: 1024px)">
                            @endif
                            <img src="{{ asset($carousel->image) }}"
                                 class="size-full object-cover"
                                 alt="{{ $carousel->title }}"
                                 loading="{{ $loop->first ? 'eager' : 'lazy' }}" />
                        </picture>
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

