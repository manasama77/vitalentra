Write-Host "🚀 Optimizing Laravel for Production..." -ForegroundColor Green

# Clear all caches first
Write-Host "📝 Clearing existing caches..." -ForegroundColor Yellow
php artisan optimize:clear

# Build frontend assets
Write-Host "🎨 Building frontend assets..." -ForegroundColor Yellow
npm run build

# Cache configuration
Write-Host "⚙️  Caching configuration..." -ForegroundColor Yellow
php artisan config:cache

# Cache views
Write-Host "👀 Caching views..." -ForegroundColor Yellow
php artisan view:cache

# Cache events
Write-Host "📡 Caching events..." -ForegroundColor Yellow
php artisan event:cache

# Generate optimized autoloader
Write-Host "📦 Optimizing autoloader..." -ForegroundColor Yellow
composer dump-autoload --optimize

Write-Host "✅ Production optimization complete!" -ForegroundColor Green
Write-Host "❗ Note: Route caching skipped due to infinite recursion issue" -ForegroundColor Red
Write-Host "   This does not affect functionality, only performance" -ForegroundColor Red
