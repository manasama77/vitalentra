@props(['news'])
<section id="blog" class="bg-base-300 mx-auto w-full px-4 py-16 md:px-6 md:py-24 lg:px-8">
    <!-- Section Header -->
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        {{-- <div class="mb-12 space-y-4 text-center sm:mb-16 lg:mb-24"> --}}
        <div class="mx-auto mb-12 max-w-[700px] text-center">
            <h6 class="text-primary scroll-revealed mb-2 block text-lg font-semibold">
                {{ __('news_landing.title') }}
            </h6>
            <h2 class="text-base-content scroll-revealed mb-6 text-3xl leading-tight md:text-4xl">
                {{ __('news_landing.sub_title') }}
            </h2>
        </div>
    </div>

    <!-- Blog Cards Grid -->
    <div class="mb-12 grid grid-cols-1 gap-8 px-4 md:grid-cols-2 md:px-14 lg:grid-cols-3">
        @foreach ($news as $n)
            <div class="card scroll-revealed group bg-white shadow-lg transition-all duration-300 hover:shadow-xl">
                <figure class="overflow-hidden">
                    <a href="{{ route('news.show', $n->slug) }}">
                        <img src="{{ asset($n->image) }}"
                             alt="{{ $n->title }}"
                             class="group-hover:scale-102 w-full object-cover transition-transform duration-300 ease-in-out">
                    </a>
                </figure>
                <div class="card-body p-6">
                    <div class="mb-3 flex items-center text-sm text-gray-500">
                        <i class="fas fa-calendar fa-fw mr-1"></i>
                        <time datetime="2024-01-15">
                            {{ $n->publish_date_formatted }}
                        </time>
                    </div>
                    <h3 class="card-title mb-3 line-clamp-2 text-xl font-semibold text-gray-900">
                        <a href="{{ route('news.show', $n->slug) }}" class="text-base-content group-hover:text-primary">
                            {{ $n->title }}
                        </a>
                    </h3>
                    <p class="mb-4 line-clamp-3 text-gray-600">
                        {!! Str::limit(strip_tags($n->content), 200) !!}
                    </p>
                    <div class="card-actions">
                        <a href="{{ route('news.show', $n->slug) }}" class="btn btn-primary btn-sm">
                            {{ __('news_landing.button_text') }}
                            <i class="fas fa-chevron-right ml-1 text-[10px]"></i>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Bottom Section - Read More Blog Button -->
    <div class="scroll-revealed text-center">
        <a href="{{ route('news.list') }}"
           class="btn btn-outline btn-lg hover:btn-primary px-8 py-3 transition-all duration-300">
            <svg class="mr-2 h-5 w-5"
                 fill="none"
                 stroke="currentColor"
                 viewBox="0 0 24 24">
                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                </path>
            </svg>
            {{ __('news_landing.view_all') }}
        </a>
    </div>
</section>
