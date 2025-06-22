#!/bin/bash

# Create database directory and file
mkdir -p /app/database
touch /app/database/database.sqlite

# Install dependencies
composer install --no-dev --optimize-autoloader

# Generate application key
php artisan key:generate

# Run migrations
php artisan migrate --force

# Run seeders
php artisan db:seed --force

# Clear and cache config
php artisan config:clear
php artisan config:cache

# Clear and cache routes
php artisan route:clear
php artisan route:cache

# Clear and cache views
php artisan view:clear
php artisan view:cache

# Create storage link
php artisan storage:link

echo "Build completed successfully!" 