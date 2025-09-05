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

<div class="rounded-xl border border-gray-100 bg-white p-6 shadow-lg transition-all duration-300 hover:shadow-xl">
    <div class="mb-4 flex items-center justify-between">
        <div class="{{ $iconBgColor }} rounded-lg p-3">
            {!! $icon !!}
        </div>
        @if ($badgeText)
            <span class="{{ $badgeColor }} rounded-full px-2 py-1 text-sm font-medium">{{ $badgeText }}</span>
        @endif
    </div>
    <div>
        <h3 class="text-2xl font-bold text-gray-900">{{ $value }}</h3>
        <p class="font-medium text-gray-600">{{ $title }}</p>
    </div>
</div>
