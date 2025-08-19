@section('title', $news->title . ' - Vitalentra')
@section('description', Str::limit(strip_tags($news->content), 155))
@section('image', $news->image ? asset($news->image) : asset('vitalentra-cover.png'))

<x-layouts.landing>

    <!-- News Detail Hero Section -->
    <section class="from-base-300/20 to-primary/10 bg-gradient-to-br py-20 lg:pb-20 lg:pt-32">
        <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <!-- Breadcrumb Navigation -->
                <nav aria-label="Breadcrumb" class="mb-6">
                    <ol class="flex items-center justify-center gap-2 text-sm text-neutral-600">
                        <li>
                            <a href="{{ route('home') }}" class="hover:text-primary text-secondary transition-colors">
                                {{ __('news.home') ?? 'Home' }}
                            </a>
                        </li>
                        <li aria-hidden="true">/</li>
                        <li>
                            <a href="{{ route('news.list') }}"
                               class="hover:text-primary text-secondary transition-colors">
                                {{ __('news.news') ?? 'News and Blog' }}
                            </a>
                        </li>
                        <li aria-hidden="true">/</li>
                        <li class="font-medium text-neutral-800">{{ Str::limit($news->title, 20) }}</li>
                    </ol>
                </nav>

                <!-- Title -->
                <h1
                    class="scroll-revealed text-base-content mx-auto mb-6 max-w-4xl text-3xl font-bold md:text-4xl lg:text-5xl">
                    {{ $news->title }}
                </h1>

                <!-- Meta Information -->
                <div
                     class="scroll-revealed flex flex-col items-center justify-center gap-4 text-neutral-600 sm:flex-row sm:gap-8">
                    <div class="flex items-center">
                        <i class="fas fa-calendar mr-2" aria-hidden="true"></i>
                        <time datetime="{{ $news->publish_date->format('Y-m-d') }}">
                            {{ $news->publish_date_formatted }}
                        </time>
                    </div>
                    @if ($news->category)
                        <div class="xs:block hidden h-1 w-1 rounded-full bg-neutral-400" aria-hidden="true"></div>
                        <div class="flex items-center">
                            <i class="fas fa-tag mr-2" aria-hidden="true"></i>
                            <span>{{ strtoupper($news->category) }}</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content Section -->
    <section class="bg-base-100 py-16 lg:py-24">
        <div class="container mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
            <!-- Featured Image -->
            @if ($news->image)
                <div class="scroll-revealed mb-12 overflow-hidden rounded-2xl shadow-lg">
                    <img src="{{ asset($news->image) }}"
                         alt="{{ $news->title }}"
                         class="h-auto w-full object-contain md:h-80 md:object-cover lg:h-96"
                         loading="lazy">
                </div>
            @endif

            <!-- Article Content -->
            <article class="scroll-revealed prose prose-sm md:prose-md lg:prose-lg max-w-none" role="main">
                <div class="text-base-content leading-relaxed">
                    {!! $news->content !!}
                </div>
            </article>

            <!-- Share Section -->
            <div class="scroll-revealed mt-12 border-t border-neutral-200 pt-8">
                <div class="flex flex-col gap-6 md:flex-row md:items-center md:justify-between">
                    <div class="flex-1">
                        <h3 class="text-base-content mb-2 text-lg font-semibold">
                            {{ __('news.share_article') ?? 'Share this article' }}
                        </h3>
                        <p class="text-sm text-neutral-600 md:text-base">
                            {{ __('news.share_description') ?? 'Help spread the word by sharing this article with your network.' }}
                        </p>
                    </div>
                    <div class="flex flex-wrap gap-3 md:flex-shrink-0"
                         role="group"
                         aria-label="Share options">
                        <!-- Facebook Share -->
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="btn btn-circle btn-outline btn-sm hover:btn-primary flex-shrink-0"
                           aria-label="Share on Facebook">
                            <i class="fab fa-facebook-f" aria-hidden="true"></i>
                        </a>
                        <!-- Twitter Share -->
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($news->title) }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="btn btn-circle btn-outline btn-sm hover:btn-primary flex-shrink-0"
                           aria-label="Share on Twitter">
                            <i class="fab fa-twitter" aria-hidden="true"></i>
                        </a>
                        <!-- Instagram Share -->
                        <a href="https://www.instagram.com/"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="btn btn-circle btn-outline btn-sm hover:btn-primary flex-shrink-0"
                           aria-label="Share on Instagram">
                            <i class="fab fa-instagram" aria-hidden="true"></i>
                        </a>
                        <!-- WhatsApp Share -->
                        <a href="https://wa.me/?text={{ urlencode($news->title . ' - ' . request()->fullUrl()) }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="btn btn-circle btn-outline btn-sm hover:btn-primary flex-shrink-0"
                           aria-label="Share on WhatsApp">
                            <i class="fab fa-whatsapp" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <hr />

    <!-- Related News Section -->
    <section class="bg-base-200 scroll-revealed py-16 lg:py-24">
        <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-12 text-center">
                <h2 class="scroll-revealed text-base-content mb-4 text-3xl font-bold md:text-4xl">
                    {{ __('news.related_articles') ?? 'Related Articles' }}
                </h2>
                <p class="scroll-revealed mx-auto max-w-2xl text-lg text-neutral-600">
                    {{ __('news.related_description') ?? 'Discover more insights and updates from our latest news and articles.' }}
                </p>
            </div>

            <!-- Related News Grid -->
            <div class="grid w-full grid-cols-1 gap-8 px-2 md:grid-cols-2 lg:grid-cols-3">
                @forelse($relatedNews as $n)
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
                                <time datetime="2024-01-15">
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
                                    {{ __('news_landing.button_text') }}
                                    <i class="fas fa-chevron-right ml-1 text-[10px]"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center">
                        <p class="text-neutral-600">
                            {{ __('news.no_related') ?? 'No related articles found.' }}
                        </p>
                    </div>
                @endforelse
            </div>

            <!-- View All News Button -->
            <div class="mt-12 px-4 text-center">
                <a href="{{ route('news.list') }}"
                   class="btn btn-outline btn-lg hover:btn-primary md:text-md px-8 py-3 text-sm transition-all duration-300 lg:text-lg">
                    {{ __('news.view_all') ?? 'View All News' }}
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>
</x-layouts.landing>
