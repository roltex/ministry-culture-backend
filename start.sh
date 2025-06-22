#!/bin/bash

set -e  # Exit on any error

echo "Starting Laravel application setup..."

# Create database if it doesn't exist
mkdir -p /app/database
if [ ! -f /app/database/database.sqlite ]; then
    touch /app/database/database.sqlite
    echo "Created database file"
fi

# Set proper permissions
chmod 664 /app/database/database.sqlite
chmod 775 /app/database

# Generate application key if not set
if [ -z "$APP_KEY" ]; then
    php artisan key:generate
    echo "Generated application key"
fi

# Clear all caches first
php artisan config:clear || echo "Config clear failed, continuing..."
php artisan cache:clear || echo "Cache clear failed, continuing..."
php artisan route:clear || echo "Route clear failed, continuing..."
php artisan view:clear || echo "View clear failed, continuing..."
echo "Cleared all caches"

# Run migrations with error handling
if php artisan migrate --force; then
    echo "Migrations completed successfully"
else
    echo "Migration failed, but continuing..."
fi

# Run seeders with error handling
if php artisan db:seed --force; then
    echo "Seeders completed successfully"
else
    echo "Seeding failed, but continuing..."
fi

# Cache configuration
if php artisan config:cache; then
    echo "Configuration cached successfully"
else
    echo "Configuration caching failed, but continuing..."
fi

# Create storage link
if php artisan storage:link; then
    echo "Storage link created successfully"
else
    echo "Storage link creation failed, but continuing..."
fi

echo "Setup completed. Starting server..."

# Start the application with proper error handling
exec php -S 0.0.0.0:$PORT -t public/ 