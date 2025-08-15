# 🚀 Ubuntu Production Deployment Guide

## Prerequisites untuk Ubuntu Server

### 1. Install Required Packages

```bash
# Update package manager
sudo apt update && sudo apt upgrade -y

# Install PHP 8.2+ dan extensions
sudo apt install php8.2 php8.2-cli php8.2-fpm php8.2-mysql php8.2-sqlite3 \
php8.2-curl php8.2-gd php8.2-mbstring php8.2-xml php8.2-zip php8.2-bcmath \
php8.2-intl php8.2-readline -y

# Install Composer
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

# Install Node.js dan npm
curl -fsSL https://deb.nodesource.com/setup_18.x | sudo -E bash -
sudo apt install nodejs -y

# Install Git
sudo apt install git -y
```

### 2. Clone Repository

```bash
git clone https://github.com/manasama77/vitalentra.git
cd vitalentra
```

### 3. Setup Environment

```bash
# Copy environment file
cp .env.example .env

# Edit environment variables
nano .env
```

### 4. Install Dependencies

```bash
# Install PHP dependencies
composer install --no-dev --optimize-autoloader

# Install npm dependencies
npm ci --only=production
```

## 🚀 Production Optimization

### Single Command Deployment

```bash
# Make script executable (if not already)
chmod +x optimize-production.sh

# Run optimization
./optimize-production.sh
```

### What the script does:

1. ✅ **Error checking** - Validates Laravel directory
2. ✅ **Clear caches** - Removes all existing caches
3. ✅ **Install npm deps** - Production-only dependencies
4. ✅ **Build assets** - Compile CSS/JS for production
5. ✅ **Cache config** - Optimize configuration loading
6. ✅ **Cache views** - Precompile Blade templates
7. ✅ **Cache events** - Optimize event listeners
8. ✅ **Optimize autoloader** - Classmap authoritative mode
9. ✅ **Set permissions** - Proper Ubuntu file permissions

## 🔐 Web Server Configuration

### Nginx Configuration

```nginx
server {
    listen 80;
    server_name your-domain.com;
    root /var/www/vitalentra/public;

    index index.php index.html index.htm;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.ht {
        deny all;
    }
}
```

### Apache Configuration

```apache
<VirtualHost *:80>
    ServerName your-domain.com
    DocumentRoot /var/www/vitalentra/public

    <Directory /var/www/vitalentra/public>
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

## 🔄 Deployment Workflow

### Initial Deployment

```bash
# 1. Clone repository
git clone https://github.com/manasama77/vitalentra.git
cd vitalentra

# 2. Setup environment
cp .env.example .env
nano .env  # Configure database, APP_ENV=production, etc.

# 3. Install dependencies
composer install --no-dev --optimize-autoloader

# 4. Generate application key
php artisan key:generate

# 5. Run migrations
php artisan migrate --force

# 6. Run optimization script
./optimize-production.sh

# 7. Set web server permissions
sudo chown -R www-data:www-data /var/www/vitalentra
sudo chmod -R 755 /var/www/vitalentra
sudo chmod -R 775 /var/www/vitalentra/storage /var/www/vitalentra/bootstrap/cache
```

### Update Deployment

```bash
# 1. Pull latest changes
git pull origin main

# 2. Update dependencies if needed
composer install --no-dev --optimize-autoloader

# 3. Run migrations
php artisan migrate --force

# 4. Run optimization
./optimize-production.sh
```

## 📊 Performance Optimizations Included

### Backend Optimizations:

- ✅ **Config caching** - Faster configuration loading
- ✅ **View caching** - Precompiled Blade templates
- ✅ **Event caching** - Optimized event discovery
- ✅ **Autoloader optimization** - Classmap authoritative
- ✅ **Production dependencies** - No dev packages

### Frontend Optimizations:

- ✅ **Asset building** - Minified CSS/JS
- ✅ **Tree shaking** - Remove unused code
- ✅ **Bundling** - Combine files for faster loading
- ✅ **Production npm deps** - Smaller node_modules

### Multilanguage Optimizations:

- ✅ **Helper functions cached** - Autoloader optimized
- ✅ **Session-based switching** - No database queries
- ✅ **Middleware optimized** - Minimal overhead

## ⚠️ Known Issues & Solutions

### Route Caching Issue:

- **Problem**: `php artisan route:cache` causes infinite recursion
- **Solution**: Skipped in optimization script
- **Impact**: Minimal (~1-2ms per request)
- **Status**: Waiting for Laravel 12.x fix

### File Permissions:

```bash
# If permission issues occur:
sudo chown -R www-data:www-data /var/www/vitalentra
sudo chmod -R 755 /var/www/vitalentra
sudo chmod -R 775 /var/www/vitalentra/storage /var/www/vitalentra/bootstrap/cache
```

## 🔍 Troubleshooting

### Common Issues:

1. **"Permission denied"**: Run `chmod +x optimize-production.sh`
2. **"artisan not found"**: Run script from Laravel root directory
3. **"npm command not found"**: Install Node.js
4. **"composer command not found"**: Install Composer

### Debug Commands:

```bash
# Check PHP version
php -v

# Check Laravel version
php artisan --version

# Check file permissions
ls -la storage/

# Check web server status
sudo systemctl status nginx  # or apache2
```

## 📈 Expected Results

After running the optimization script:

- ⚡ **Faster page loads** - Cached config and views
- 🎨 **Optimized assets** - Minified CSS/JS
- 🚀 **Better performance** - Production-ready setup
- 🌍 **Multilanguage ready** - All helper functions working
- 🔒 **Secure permissions** - Proper Ubuntu file permissions

---

**Ready for production deployment pada Ubuntu server!** 🚀
