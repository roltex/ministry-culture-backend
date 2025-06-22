#!/bin/bash

# Create database if it doesn't exist
mkdir -p /app/database
if [ ! -f /app/database/database.sqlite ]; then
    touch /app/database/database.sqlite
    echo "Created database file"
fi

# Generate application key if not set
if [ -z "$APP_KEY" ]; then
    php artisan key:generate
    echo "Generated application key"
fi

# Run migrations
php artisan migrate --force
echo "Migrations completed"

# Run seeders
php artisan db:seed --force
echo "Seeders completed"

# Clear and cache config
php artisan config:clear
php artisan config:cache
echo "Configuration cached"

# Create storage link
php artisan storage:link
echo "Storage link created"

# Start the application
php artisan serve --host=0.0.0.0 --port=$PORT 