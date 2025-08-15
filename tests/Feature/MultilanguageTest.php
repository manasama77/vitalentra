<?php

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

test('invalid language returns 400', function () {
    $response = $this->get('/language/invalid');
    $response->assertStatus(400);
});

test('test multilanguage page loads', function () {
    $response = $this->get('/test-multilanguage');
    $response->assertOk();
    $response->assertViewIs('test-multilanguage');
});

test('middleware sets correct locale', function () {
    // Test with session locale
    $this->withSession(['locale' => 'en'])
         ->get('/')
         ->assertOk();

    expect(app()->getLocale())->toBe('en');

    // Test with URL parameter
    $this->get('/?lang=id');
    expect(app()->getLocale())->toBe('id');
});
