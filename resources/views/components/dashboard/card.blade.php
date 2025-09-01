@props([
    'title' => '',
    'value' => 0,
    'description' => '',
    'icon' => '',
    'iconBgColor' => 'bg-blue-100',
    'iconColor' => 'text-blue-600',
    'badgeText' => '',
    'badgeColor' => 'bg-blue-100 text-blue-600',
    'footerText' => '',
    'footerValue' => '',
    'footerValueColor' => 'text-blue-600',
])

<div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 border border-gray-100">
    <div class="flex items-center justify-between mb-4">
        <div class="{{ $iconBgColor }} p-3 rounded-lg">
            {!! $icon !!}
        </div>
        @if ($badgeText)
            <span class="text-sm font-medium px-2 py-1 rounded-full {{ $badgeColor }}">{{ $badgeText }}</span>
        @endif
    </div>
    <div class="mb-2">
        <h3 class="text-2xl font-bold text-gray-900">{{ $value }}</h3>
        <p class="text-gray-600 font-medium">{{ $title }}</p>
    </div>
    @if ($description || $footerText)
        <div class="text-sm text-gray-500">
            @if ($footerText && $footerValue)
                <span class="{{ $footerValueColor }} font-semibold">{{ $footerValue }}</span> {{ $footerText }}
            @else
                {{ $description }}
            @endif
        </div>
    @endif
</div>
