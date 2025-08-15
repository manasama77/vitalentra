<?php

use Illuminate\Support\Facades\Session;

test('helper functions work correctly', function () {
    // Test current_locale function
    expect(current_locale())->toBeString();
    expect(in_array(current_locale(), ['id', 'en']))->toBeTrue();

    // Test is_locale function
    expect(is_locale('id'))->toBeBool();
    expect(is_locale('nonexistent'))->toBeFalse();

    // Test locale_name function
    expect(locale_name('id'))->toBe('Indonesia');
    expect(locale_name('en'))->toBe('English');

    // Test locale_flag function
    expect(locale_flag('id'))->toBe('fi-id');
    expect(locale_flag('en'))->toBe('fi-us');

    // Test supported_locales function
    $locales = supported_locales();
    expect($locales)->toBeArray();
    expect($locales)->toHaveKeys(['id', 'en']);
});

test('language switching works', function () {
    // Test switching to English
    $response = $this->get('/language/en');
    $response->assertRedirect();
    $response->assertSessionHas('locale', 'en');

    // Test switching to Indonesian
    $response = $this->get('/language/id');
    $response->assertRedirect();
    $response->assertSessionHas('locale', 'id');
});

test('invalid language returns 404', function () {
    $response = $this->get('/language/invalid');
    $response->assertStatus(404);
});

test('test multilanguage page loads', function () {
    $response = $this->get('/test-multilanguage');
    $response->assertOk();
    $response->assertViewIs('test-multilanguage');
});

it('first time visitor gets indonesian default', function () {
    // Clear all sessions to simulate first time visitor
    Session::flush();

    // Test visiting the test multilanguage page instead of homepage
    $response = $this->get('/test-multilanguage', [
        'Accept-Language' => 'id-ID,id;q=0.9',  // Simulate Indonesian browser
    ]);

    $response->assertOk();

    // Should default to Indonesian
    expect(app()->getLocale())->toBe('id');

    // Should see Indonesian content on the test page
    $response->assertSee('Konten Bahasa Indonesia');
    $response->assertSee('Ini adalah konten yang ditampilkan ketika bahasa aktif adalah');
});

test('middleware sets correct locale', function () {
    // Test with session locale
    $response = $this->withSession(['locale' => 'en'])
         ->get('/test-multilanguage');

    $response->assertOk();
    expect(app()->getLocale())->toBe('en');

    // Test with URL parameter
    $response = $this->get('/test-multilanguage?lang=id');
    $response->assertOk();
    expect(app()->getLocale())->toBe('id');
});
