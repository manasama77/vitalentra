
@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between">
        <div class="flex-1">
            <span class="text-sm text-gray-700 leading-5 dark:text-gray-400">
                {!! __('Showing') !!}
                @if ($paginator->firstItem())
                    <span class="font-medium">{{ $paginator->firstItem() }}</span>
                    {!! __('to') !!}
                    <span class="font-medium">{{ $paginator->lastItem() }}</span>
                @else
                    {{ $paginator->count() }}
                @endif
                {!! __('of') !!}
                <span class="font-medium">{{ $paginator->total() }}</span>
                {!! __('results') !!}
            </span>
        </div>
        <nav class="flex items-center gap-x-1">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <button type="button" class="btn btn-outline" disabled>{!! __('pagination.previous') !!}</button>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-outline">{!! __('pagination.previous') !!}</a>
            @endif
            <div class="flex items-center gap-x-1">
                @foreach ($elements as $element)
                    @if (is_string($element))
                        <button type="button" class="btn btn-outline btn-square" disabled>{{ $element }}</button>
                    @endif
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <a href="#" class="btn btn-outline btn-square aria-[current='page']:text-border-primary aria-[current='page']:bg-primary/10" aria-current="page">{{ $page }}</a>
                            @else
                                <a href="{{ $url }}" class="btn btn-outline btn-square">{{ $page }}</a>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </div>
            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="btn btn-outline">{!! __('pagination.next') !!}</a>
            @else
                <button type="button" class="btn btn-outline" disabled>{!! __('pagination.next') !!}</button>
            @endif
        </nav>
    </nav>
@endif
