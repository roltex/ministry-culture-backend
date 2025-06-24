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
# Copy Vite manifest to expected location for Laravel
echo "3a. Copying Vite manifest to public/build/manifest.json..."
cp public/build/.vite/manifest.json public/build/manifest.json

# Run Laravel artisan commands
echo "4. Running Laravel artisan commands..."
php artisan package:discover --ansi
php artisan filament:upgrade --ansi

# Create storage link first (important for asset publishing)
echo "5. Creating storage link..."
php artisan storage:link

# Run migrations
echo "6. Running migrations..."
php artisan migrate --force

# Run seeders
echo "7. Running seeders..."
php artisan db:seed --force

# Ensure admin user exists
echo "8. Creating admin user..."
php artisan db:seed --class=AdminUserSeeder --force

# Double-check admin user
echo "9. Verifying admin user..."
php check_admin_user.php

# Run comprehensive manual fix
echo "10. Running manual fixes..."
php manual_fix.php

# Optimize Filament for production
echo "11. Optimizing Filament for production..."
php artisan filament:optimize

# Optimize Laravel for production
echo "12. Optimizing Laravel for production..."
php artisan optimize

# Final cache clearing
echo "13. Clearing all caches..."
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear

# Final cache optimization
echo "14. Final cache optimization..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Verify Vite assets exist
echo "15. Verifying Vite assets..."
if [ -f "public/build/manifest.json" ]; then
    echo "✅ Vite manifest exists"
    echo "📄 Build directory contents:"
    ls -la public/build/
else
    echo "❌ Vite manifest missing"
fi

echo "=== Build completed successfully! ===" 