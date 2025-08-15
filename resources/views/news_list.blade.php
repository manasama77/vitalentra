@section('title', __('news.news_blog_title') . ' - Vitalentra')
@section('description', __('news.news_blog_description'))
@section('image', asset('vitalentra-cover.png'))

<x-layouts.landing>
    <!-- Hero Section -->
    <section class="from-base-300/20 to-primary/10 bg-gradient-to-br py-20 lg:pb-20 lg:pt-32">
        <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <!-- Breadcrumb Navigation -->
                <nav aria-label="Breadcrumb" class="mb-6">
                    <ol class="flex items-center justify-center gap-2 text-sm text-neutral-600">
                        <li>
                            <a href="{{ route('home') }}" class="hover:text-primary text-secondary transition-colors">
                                {{ __('news.home') }}
                            </a>
                        </li>
                        <li aria-hidden="true">/</li>
                        <li class="font-medium text-neutral-800">
                            {{ __('news.news_blog') }}
                        </li>
                    </ol>
                </nav>

                <!-- Title -->
                <h1
                    class="scroll-revealed text-base-content mx-auto mb-6 max-w-4xl text-3xl font-bold md:text-4xl lg:text-5xl">
                    {{ __('news.news_blog_title') }}
                </h1>

                <!-- Description -->
                <p class="scroll-revealed mx-auto max-w-2xl text-lg text-neutral-600">
                    {{ __('news.news_blog_subtitle') }}
                </p>
            </div>
        </div>
    </section>

    <!-- Main Content Section -->
    <section class="bg-base-200 py-16 lg:py-24">
        <div class="scroll-revealed container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            @if ($news->count() > 0)
                @if ($news->currentPage() == 1)
                    <!-- Featured Article (First Article) - Only on first page -->
                    @php $featuredNews = $news->first(); @endphp
                    <div class="mb-16">
                        <div
                             class="scroll-revealed overflow-hidden rounded-2xl bg-white shadow-lg transition-shadow duration-300 hover:shadow-xl">
                            <div class="lg:flex">
                                <!-- Featured Image -->
                                <div class="lg:w-1/2">
                                    <div class="relative h-fit overflow-hidden md:h-fit">
                                        <img src="{{ asset($featuredNews->image) }}"
                                             alt="{{ $featuredNews->title }}"
                                             class="h-full w-full object-contain transition-transform duration-300 hover:scale-105 md:object-contain"
                                             loading="eager">
                                    </div>
                                </div>

                                <!-- Featured Content -->
                                <div class="flex flex-col justify-center p-6 lg:w-1/2 lg:p-8">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center text-neutral-500">
                                            <i class="fas fa-calendar mr-2" aria-hidden="true"></i>
                                            <time datetime="{{ $featuredNews->publish_date->format('Y-m-d') }}">
                                                {{ $featuredNews->publish_date_formatted }}
                                            </time>
                                        </div>
                                        <div>
                                            <div
                                                 class="bg-primary text-primary-content rounded-full px-3 py-1 text-sm font-medium">
                                                {{ strtoupper($featuredNews->category) }}
                                            </div>
                                        </div>
                                    </div>

                                    <h2 class="text-base-content mb-4 line-clamp-2 text-xl font-bold md:text-2xl">
                                        <a href="{{ route('news.show', $featuredNews->slug) }}"
                                           class="hover:text-primary text-base-content transition-colors">
                                            {{ $featuredNews->title }}
                                        </a>
                                    </h2>

                                    <p class="text-md mb-4 line-clamp-3 text-neutral-600">
                                        {!! Str::limit(strip_tags($featuredNews->content), 150) !!}
                                    </p>

                                    <div>
                                        <a href="{{ route('news.show', $featuredNews->slug) }}"
                                           class="btn btn-primary"
                                           aria-label="Read {{ $featuredNews->title }}">
                                            {{ __('news.read_full_article') }}
                                            <i class="fas fa-arrow-right ml-2" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Other Articles Grid - Skip first article on page 1 -->
                    @if ($news->count() > 1)
                        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                            @foreach ($news->skip(1) as $n)
                                <div
                                     class="card scroll-revealed group rounded-2xl bg-white shadow-lg transition-all duration-300 hover:shadow-xl">
                                    <figure class="overflow-hidden">
                                        <a href="{{ route('news.show', $n->slug) }}">
                                            <img src="{{ asset($n->image) }}"
                                                 alt="{{ $n->title }}"
                                                 class="group-hover:scale-102 w-full object-contain transition-transform duration-300">
                                        </a>
                                    </figure>
                                    <div class="card-body p-6">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center text-neutral-500">
                                                <i class="fas fa-calendar mr-2" aria-hidden="true"></i>
                                                <time datetime="{{ $n->publish_date->format('Y-m-d') }}">
                                                    {{ $n->publish_date_formatted }}
                                                </time>
                                            </div>
                                            <div>
                                                <div
                                                     class="bg-primary text-primary-content rounded-full px-3 py-1 text-sm font-medium">
                                                    {{ strtoupper($n->category) }}
                                                </div>
                                            </div>
                                        </div>
                                        <h3 class="card-title mb-3 line-clamp-2 text-xl font-semibold text-gray-900">
                                            <a href="{{ route('news.show', $n->slug) }}"
                                               class="text-base-content group-hover:text-primary">
                                                {{ $n->title }}
                                            </a>
                                        </h3>
                                        <p class="mb-4 line-clamp-3 text-gray-600">
                                            {!! Str::limit(strip_tags($n->content), 200) !!}
                                        </p>
                                        <div class="card-actions">
                                            <a href="{{ route('news.show', $n->slug) }}"
                                               class="btn btn-primary btn-sm">
                                                {{ __('news.read_more') }}
                                                <i class="fas fa-chevron-right ml-1 text-[10px]"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                @else
                    <!-- All Articles Grid - For pages 2 and beyond -->
                    <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                        @foreach ($news as $n)
                            <div
                                 class="card scroll-revealed group bg-white shadow-lg transition-all duration-300 hover:shadow-xl">
                                <figure class="overflow-hidden">
                                    <a href="{{ route('news.show', $n->slug) }}">
                                        <img src="{{ asset($n->image) }}"
                                             alt="{{ $n->title }}"
                                             class="group-hover:scale-102 h-48 w-full object-contain transition-transform duration-300">
                                    </a>
                                </figure>
                                <div class="card-body p-6">
                                    <div class="mb-3 flex items-center text-sm text-gray-500">
                                        <i class="fas fa-calendar"></i>
                                        <time datetime="{{ $n->publish_date->format('Y-m-d') }}">
                                            {{ $n->publish_date_formatted }}
                                        </time>
                                    </div>
                                    <h3 class="card-title mb-3 line-clamp-2 text-xl font-semibold text-gray-900">
                                        <a href="{{ route('news.show', $n->slug) }}"
                                           class="text-base-content group-hover:text-primary">
                                            {{ $n->title }}
                                        </a>
                                    </h3>
                                    <p class="mb-4 line-clamp-3 text-gray-600">
                                        {!! Str::limit(strip_tags($n->content), 200) !!}
                                    </p>
                                    <div class="card-actions">
                                        <a href="{{ route('news.show', $n->slug) }}" class="btn btn-primary btn-sm">
                                            {{ __('news.read_more') }}
                                            <i class="fas fa-chevron-right ml-1 text-[10px]"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

                <!-- Pagination -->
                @if ($news->hasPages())
                    <div class="mt-12">
                        <div class="flex justify-center">
                            <nav aria-label="News pagination" class="join">
                                {{-- Previous Page Link --}}
                                @if ($news->onFirstPage())
                                    <span class="join-item btn btn-disabled" aria-disabled="true">
                                        <i class="fas fa-chevron-left mr-1" aria-hidden="true"></i>
                                        {{ __('pagination.previous') }}
                                    </span>
                                @else
                                    <a href="{{ $news->previousPageUrl() }}"
                                       class="join-item btn btn-outline hover:btn-primary"
                                       aria-label="{{ __('pagination.go_to_previous_page') }}">
                                        <i class="fas fa-chevron-left mr-1" aria-hidden="true"></i>
                                        {{ __('pagination.previous') }}
                                    </a>
                                @endif

                                {{-- Pagination Elements --}}
                                @foreach ($news->getUrlRange(1, $news->lastPage()) as $page => $url)
                                    @if ($page == $news->currentPage())
                                        <span class="join-item btn btn-primary"
                                              aria-current="page">{{ $page }}</span>
                                    @else
                                        <a href="{{ $url }}"
                                           class="join-item btn btn-outline hover:btn-primary"
                                           aria-label="{{ __('pagination.go_to_page') }} {{ $page }}">{{ $page }}</a>
                                    @endif
                                @endforeach

                                {{-- Next Page Link --}}
                                @if ($news->hasMorePages())
                                    <a href="{{ $news->nextPageUrl() }}"
                                       class="join-item btn btn-outline hover:btn-primary"
                                       aria-label="{{ __('pagination.go_to_next_page') }}">
                                        {{ __('pagination.next') }}
                                        <i class="fas fa-chevron-right ml-1" aria-hidden="true"></i>
                                    </a>
                                @else
                                    <span class="join-item btn btn-disabled" aria-disabled="true">
                                        {{ __('pagination.next') }}
                                        <i class="fas fa-chevron-right ml-1" aria-hidden="true"></i>
                                    </span>
                                @endif
                            </nav>
                        </div>

                        <!-- Pagination Info -->
                        <div class="mt-4 text-center text-sm text-neutral-600">
                            {{ __('pagination.showing') }}
                            <span class="font-medium">{{ $news->firstItem() ?? 0 }}</span>
                            {{ __('pagination.to') }}
                            <span class="font-medium">{{ $news->lastItem() ?? 0 }}</span>
                            {{ __('pagination.of') }}
                            <span class="font-medium">{{ $news->total() }}</span>
                            {{ __('pagination.results') }}
                        </div>
                    </div>
                @endif
            @else
                <!-- Empty State -->
                <div class="py-16 text-center">
                    <div class="scroll-revealed mx-auto max-w-md">
                        <div class="mb-6">
                            <i class="fas fa-newspaper text-6xl text-neutral-300" aria-hidden="true"></i>
                        </div>
                        <h2 class="text-base-content mb-4 text-2xl font-bold">
                            {{ __('news.no_articles') }}
                        </h2>
                        <p class="mb-6 text-neutral-600">
                            {{ __('news.no_articles_description') }}
                        </p>
                        <a href="{{ route('home') }}" class="btn btn-primary">
                            <i class="fas fa-home mr-2" aria-hidden="true"></i>
                            {{ __('news.back_to_home') }}
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </section>
</x-layouts.landing>

