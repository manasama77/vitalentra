<?php

use App\Livewire\Settings\Profile;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Appearance;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;

Route::get('/', [BerandaController::class, 'index'])->name('home');
Route::get('/phpinfo', function () {
    return phpinfo();
});
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
