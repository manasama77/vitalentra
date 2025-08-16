#!/bin/bash

# Laravel Production Optimization Script for Ubuntu
# Usage: ./optimize-production.sh

set -e  # Exit on any error

echo "🚀 Optimizing Laravel for Production (Ubuntu)..."

# Check if we're in Laravel root directory
if [ ! -f "artisan" ]; then
    echo "❌ Error: artisan file not found. Please run this script from Laravel root directory."
    exit 1
fi

# Clear all caches first
echo "📝 Clearing existing caches..."
php artisan optimize:clear

# Install/update npm dependencies
echo "📦 Installing/updating npm dependencies..."
npm ci --only=production

# Build frontend assets
echo "🎨 Building frontend assets..."
npm run build

# Cache configuration
echo "⚙️  Caching configuration..."
php artisan config:cache

# Cache views
echo "👀 Caching views..."
php artisan view:cache

# Cache events
echo "📡 Caching events..."
php artisan event:cache

# Generate optimized autoloader
echo "📦 Optimizing composer autoloader..."
composer dump-autoload --optimize --no-dev --classmap-authoritative

# Set proper permissions for Ubuntu/Linux
echo "🔐 Setting proper file permissions..."
chmod -R 755 storage bootstrap/cache
chmod -R 775 storage/logs storage/framework

echo ""
echo "✅ Production optimization complete!"
echo "❗ Note: Route caching skipped due to infinite recursion issue"
echo "   This does not affect functionality, only performance"
echo ""
echo "📋 Completed tasks:"
echo "   ✓ Cleared all caches"
echo "   ✓ Installed production npm dependencies"
echo "   ✓ Built frontend assets"
echo "   ✓ Cached configuration"
echo "   ✓ Cached views"
echo "   ✓ Cached events"
echo "   ✓ Optimized autoloader"
echo "   ✓ Set proper file permissions"
echo ""
echo "🚀 Ready for production deployment!"
