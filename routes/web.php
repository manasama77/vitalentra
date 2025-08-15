<?php

use App\Livewire\Settings\Profile;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Appearance;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\TestController;

// Language switching route - simplified for caching
Route::get('language/{locale}', [LanguageController::class, 'switch'])
    ->where('locale', 'id|en')
    ->name('language.switch');

// Test route for multilanguage (development only)
Route::get('test-multilanguage', [TestController::class, 'multilanguage'])->name('test.multilanguage');

Route::get('/', [BerandaController::class, 'index'])->name('home');
// Route::get('/phpinfo', [TestController::class, 'phpinfo']);
Route::get('news-blog/', [BerandaController::class, 'news_list'])->name('news.list');
Route::get('news/{slug}', [BerandaController::class, 'show'])->name('news.show');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__ . '/auth.php';
