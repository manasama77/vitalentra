@props(['webpSrc', 'fallbackSrc', 'alt' => 'Image', 'class' => '', 'loading' => 'lazy'])

<picture>
    <source src="{{ $webpSrc }}" type="image/webp">
    <img src="{{ $fallbackSrc }}"
         alt="{{ $alt }}"
         class="{{ $class }}"
         loading="{{ $loading }}" />
</picture>

