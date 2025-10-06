<?php

use App\Livewire\Settings\Profile;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Appearance;
use App\Livewire\Components\FlyonuiThemeDemo;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\CarouselController;
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
// Route::get('test-multilanguage', [TestController::class, 'multilanguage'])->name('test.multilanguage');

Route::get('/', [BerandaController::class, 'index'])->name('home');
// Route::get('/phpinfo', [TestController::class, 'phpinfo']);
Route::get('news-blog/', [BerandaController::class, 'news_list'])->name('news.list');
Route::get('news/{slug}', [BerandaController::class, 'show'])->name('news.show');

// SEO Routes
Route::get('sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

// Route::get('dashboard', [DashboardController::class, 'index'])
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

Route::middleware(['auth', 'noindex'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('berita', [NewsController::class, 'index'])->name('berita.index');
    Route::get('berita/create', [NewsController::class, 'create'])->name('berita.create');
    Route::post('berita/store', [NewsController::class, 'store'])->name('berita.store');
    Route::get('berita/show/{id}', [NewsController::class, 'show'])->name('berita.backend.show');
    Route::get('berita/edit/{id}', [NewsController::class, 'edit'])->name('berita.edit');
    Route::put('berita/update/{id}', [NewsController::class, 'update'])->name('berita.update');
    Route::delete('berita/destroy/{id}', [NewsController::class, 'destroy'])->name('berita.destroy');

    Route::get('carousel', [CarouselController::class, 'index'])->name('carousel.index');
    Route::get('carousel/create', [CarouselController::class, 'create'])->name('carousel.create');
    Route::post('carousel/store', [CarouselController::class, 'store'])->name('carousel.store');
    Route::get('carousel/up/{carousel}', [CarouselController::class, 'up'])->name('carousel.up');
    Route::get('carousel/down/{carousel}', [CarouselController::class, 'down'])->name('carousel.down');
    Route::get('carousel/edit/{carousel}', [CarouselController::class, 'edit'])->name('carousel.edit');
    Route::put('carousel/update/{carousel}', [CarouselController::class, 'update'])->name('carousel.update');
    Route::delete('carousel/destroy/{carousel}', [CarouselController::class, 'destroy'])->name('carousel.destroy');

    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');

    // FlyonUI Theme Demo
    Route::get('flyonui-demo', FlyonuiThemeDemo::class)->name('flyonui.demo');
});

require __DIR__ . '/auth.php';
