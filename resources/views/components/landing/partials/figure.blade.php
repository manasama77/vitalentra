@props([
    'photo' =>
        'https://ui-avatars.com/api/?name=' . urlencode($name ?? 'Person') . '&background=e5e7eb&color=6b7280&size=120',
    'name',
    'position',
    'triggerId' => Str::slug($name),
    'contentKey' => null,
])
<figure id="{{ $triggerId }}"
        class="bg-body-light-1 dark:bg-body-dark-12/10 shadow-card-2 group flex h-[280px] w-full cursor-pointer flex-col justify-between rounded-xl px-5 pb-10 pt-12 hover:-translate-y-1 hover:shadow-lg"
        onclick="openModal('{{ $triggerId }}')">
    <div class="relative z-10 mx-auto h-[150px] w-[150px]">
        @php
            $baseName = basename($photo, '.jpg');
            $webpSrc = asset('build/assets/optimized/' . $baseName . '.webp');
        @endphp

        <x-optimized-image :webpSrc="$webpSrc"
                           :fallbackSrc="$photo"
                           alt="Team picture"
                           class="h-full w-full rounded-full object-cover"
                           loading="lazy" />

        <span
              class="bg-error absolute bottom-1 left-12 -z-10 h-10 w-10 rounded-full opacity-100 transition-all duration-500 ease-in-out group-hover:left-0 group-hover:opacity-100"></span>
        <span
              class="bg-primary absolute right-12 top-1 -z-10 h-10 w-10 rounded-full opacity-100 transition-all duration-500 ease-in-out group-hover:right-0 group-hover:opacity-100"></span>
    </div>
    <figcaption class="block text-center">
        <h4 class="text-base-content mb-1 text-lg font-semibold">
            {{ $name }}
        </h4>
        <p class="text-body-light-11 dark:text-body-dark-11 mb-5 text-sm">
            {{ $position }}
        </p>
    </figcaption>
</figure>
