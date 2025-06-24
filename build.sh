#!/bin/bash

echo "=== Starting Railway Build Process ==="

# Create database directory and file
mkdir -p /app/database
touch /app/database/database.sqlite

# Install dependencies
echo "1. Installing Composer dependencies..."
composer install --no-dev --optimize-autoloader

# Install npm dependencies and build assets
echo "2. Installing NPM dependencies..."
npm install
echo "3. Building NPM assets..."
npm run build

# Run Laravel artisan commands
echo "4. Running Laravel artisan commands..."
php artisan package:discover --ansi
php artisan filament:upgrade --ansi

# Create storage link first (important for asset publishing)
echo "5. Creating storage link..."
php artisan storage:link

# Publish Filament assets with multiple attempts
echo "6. Publishing Filament assets..."
php artisan vendor:publish --tag=filament-config --ansi
php artisan vendor:publish --tag=filament-assets --ansi --force

# Clear caches before publishing
echo "7. Clearing caches..."
php artisan config:clear
php artisan cache:clear

# Force publish assets again
echo "8. Force publishing assets..."
php artisan vendor:publish --tag=filament-assets --force --ansi

# Run our custom asset fix scripts
echo "9. Running asset fix scripts..."
php force_publish_assets.php
php fix_filament_assets.php

# Verify assets were created
echo "10. Verifying assets..."
php verify_assets.php

# Generate application key
echo "11. Generating application key..."
php artisan key:generate

# Run migrations
echo "12. Running migrations..."
php artisan migrate --force

# Run seeders
echo "13. Running seeders..."
php artisan db:seed --force

# Ensure admin user exists
echo "14. Creating admin user..."
php artisan db:seed --class=AdminUserSeeder --force

# Double-check admin user
echo "15. Verifying admin user..."
php check_admin_user.php

# Run comprehensive manual fix
echo "16. Running manual fixes..."
php manual_fix.php

# Final cache optimization
echo "17. Final cache optimization..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Final verification
echo "18. Final asset verification..."
php verify_assets.php

echo "=== Build completed successfully! ===" 