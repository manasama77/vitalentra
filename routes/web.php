<?php

use App\Livewire\Settings\Profile;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Appearance;
use App\Livewire\Components\FlyonuiThemeDemo;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SitemapController;

// Language switching route - simplified for caching
Route::get('language/{locale}', [LanguageController::class, 'switch'])
    ->where('locale', 'id|en')
    ->name('language.switch');

// Test route for multilanguage (development only)
Route::get('test-multilanguage', [TestController::class, 'multilanguage'])->name('test.multilanguage');

// Test route for dashboard design (development only)
Route::get('test-dashboard', [DashboardController::class, 'index'])->name('test.dashboard');

Route::get('/', [BerandaController::class, 'index'])->name('home');
// Route::get('/phpinfo', [TestController::class, 'phpinfo']);
Route::get('news-blog/', [BerandaController::class, 'news_list'])->name('news.list');
Route::get('news/{slug}', [BerandaController::class, 'show'])->name('news.show');

// SEO Routes
Route::get('sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

// Route::get('dashboard', [DashboardController::class, 'index'])
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

Route::middleware(['auth', 'verified', 'noindex'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('news', [DashboardController::class, 'index'])->name('news.index');
    // Route::resource('news', NewsController::class);
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');

    // FlyonUI Theme Demo
    Route::get('flyonui-demo', FlyonuiThemeDemo::class)->name('flyonui.demo');
});

require __DIR__ . '/auth.php';
