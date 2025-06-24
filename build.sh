#!/bin/bash

echo "=== Starting Railway Build Process ==="

# Create database directory and file
mkdir -p /app/database
touch /app/database/database.sqlite

# Install dependencies
echo "1. Installing Composer dependencies..."
composer install --no-dev --optimize-autoloader

# Install npm dependencies and build Vite assets
echo "2. Installing NPM dependencies..."
npm install
echo "3. Building Vite assets for Filament v3..."
npm run build

# Run Laravel artisan commands
echo "4. Running Laravel artisan commands..."
php artisan package:discover --ansi
php artisan filament:upgrade --ansi

# Create storage link first (important for asset publishing)
echo "5. Creating storage link..."
php artisan storage:link

# Clear all caches before building
echo "6. Clearing caches..."
php artisan config:clear
php artisan cache:clear
php artisan view:clear

# Generate application key
echo "7. Generating application key..."
php artisan key:generate

# Run migrations
echo "8. Running migrations..."
php artisan migrate --force

# Run seeders
echo "9. Running seeders..."
php artisan db:seed --force

# Ensure admin user exists
echo "10. Creating admin user..."
php artisan db:seed --class=AdminUserSeeder --force

# Double-check admin user
echo "11. Verifying admin user..."
php check_admin_user.php

# Run comprehensive manual fix
echo "12. Running manual fixes..."
php manual_fix.php

# Final cache optimization
echo "13. Final cache optimization..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Verify Vite assets exist
echo "14. Verifying Vite assets..."
if [ -f "public/build/manifest.json" ]; then
    echo "✅ Vite manifest exists"
    echo "📄 Build directory contents:"
    ls -la public/build/
else
    echo "❌ Vite manifest missing"
fi

echo "=== Build completed successfully! ===" 