<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Add custom Blade directives for localization
        Blade::directive('locale', function ($expression) {
            return "<?php echo current_locale(); ?>";
        });

        Blade::directive('isLocale', function ($expression) {
            return "<?php if(is_locale({$expression})): ?>";
        });

        Blade::directive('endisLocale', function () {
            return "<?php endif; ?>";
        });
    }
}
