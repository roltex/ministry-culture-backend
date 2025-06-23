#!/bin/bash

# Create database directory and file
mkdir -p /app/database
touch /app/database/database.sqlite

# Install dependencies
composer install --no-dev --optimize-autoloader

# Install npm dependencies and build assets
npm install
npm run build

# Run Laravel artisan commands that were removed from composer.json
php artisan package:discover --ansi
php artisan filament:upgrade --ansi

# Create storage link first (important for asset publishing)
php artisan storage:link

# Publish Filament assets and configuration
php artisan vendor:publish --tag=filament-config --ansi
php artisan vendor:publish --tag=filament-assets --ansi

# Force publish assets with robust approach
php force_publish_assets.php

# Generate application key
php artisan key:generate

# Run migrations
php artisan migrate --force

# Run seeders
php artisan db:seed --force

# Ensure admin user exists (create if not exists)
php artisan db:seed --class=AdminUserSeeder --force

# Double-check admin user with custom script
php check_admin_user.php

# Run comprehensive manual fix to ensure everything works
php manual_fix.php

# Clear and cache config
php artisan config:clear
php artisan config:cache

# Clear and cache routes
php artisan route:clear
php artisan route:cache

# Clear and cache views
php artisan view:clear
php artisan view:cache

echo "Build completed successfully!" 