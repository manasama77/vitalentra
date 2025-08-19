@props(['news'])
<section id="blog" class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
    <!-- Section Header -->
    <div class="mb-12 text-center">
        <h2 class="scroll-revealed text-base-content mb-4 text-3xl font-bold md:text-4xl">
            {{ __('news_landing.title') }}
        </h2>
        <p class="scroll-revealed mx-auto max-w-2xl text-lg text-neutral-600">
            {{ __('news_landing.sub_title') }}
        </p>
    </div>

    <!-- Blog Cards Grid -->
    <div class="mb-12 grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
        @foreach ($news as $n)
            <div class="card scroll-revealed group bg-white shadow-lg transition-all duration-300 hover:shadow-xl">
                <figure class="overflow-hidden">
                    <a href="{{ route('news.show', $n->slug) }}">
                        <img src="{{ asset($n->image) }}"
                             alt="{{ $n->title }}"
                             class="group-hover:scale-102 h-48 w-full object-contain transition-transform duration-300">
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
