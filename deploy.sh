#!/bin/bash

# Exit on any error
set -e

echo "Starting deployment..."

# Create storage link if it doesn't exist
if [ ! -L "public/storage" ]; then
    echo "Creating storage symbolic link..."
    php artisan storage:link
else
    echo "Storage symbolic link already exists"
fi

# Clear and cache config
php artisan config:clear
php artisan config:cache

# Clear and cache routes
php artisan route:clear
php artisan route:cache

# Clear and cache views
php artisan view:clear
php artisan view:cache

echo "Deployment completed successfully!" 