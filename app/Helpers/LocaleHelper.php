<?php

use Illuminate\Support\Facades\App;

if (!function_exists('current_locale')) {
    /**
     * Get current application locale
     *
     * @return string
     */
    function current_locale(): string
    {
        return App::getLocale();
    }
}

if (!function_exists('is_locale')) {
    /**
     * Check if current locale matches given locale
     *
     * @param string $locale
     * @return bool
     */
    function is_locale(string $locale): bool
    {
        return App::isLocale($locale);
    }
}

if (!function_exists('supported_locales')) {
    /**
     * Get all supported locales
     *
     * @return array
     */
    function supported_locales(): array
    {
        return [
            'id' => [
                'name' => 'Indonesia',
                'flag' => 'fi-id',
                'display' => 'Indonesia',
            ],
            'en' => [
                'name' => 'English',
                'flag' => 'fi-us',
                'display' => 'English',
            ],
        ];
    }
}

if (!function_exists('locale_name')) {
    /**
     * Get locale display name
     *
     * @param string|null $locale
     * @return string
     */
    function locale_name(?string $locale = null): string
    {
        $locale = $locale ?: current_locale();
        $locales = supported_locales();

        return $locales[$locale]['display'] ?? $locale;
    }
}

if (!function_exists('locale_flag')) {
    /**
     * Get locale flag class
     *
     * @param string|null $locale
     * @return string
     */
    function locale_flag(?string $locale = null): string
    {
        $locale = $locale ?: current_locale();
        $locales = supported_locales();

        return $locales[$locale]['flag'] ?? 'fi-id';
    }
}
