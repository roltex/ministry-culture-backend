#!/bin/bash

set -e  # Exit on any error

echo "--- STARTUP SCRIPT V6 (S3 + Public Dir) ---"
echo "Current PWD: $(pwd)"
echo "Listing files in /app:"
ls -la /app

# Create .env file if it doesn't exist
if [ ! -f /app/.env ]; then
    echo "Creating .env file from example..."
    cp /app/.env.example /app/.env
fi

# Create database and log files/directories if they don't exist
mkdir -p /app/database
mkdir -p /app/storage/logs
touch /app/storage/logs/laravel.log
touch /app/storage/logs/server-debug.log

if [ ! -f /app/database/database.sqlite ]; then
    touch /app/database/database.sqlite
    echo "Created database file."
fi

# Set proper permissions
echo "Setting permissions..."
chmod -R 775 /app/storage
chmod 664 /app/database/database.sqlite
chmod 775 /app/database

# Create .env file if it doesn't exist
if [ ! -f /app/.env ]; then
    echo "Creating .env file..."
    cat > /app/.env << EOF
APP_NAME="Ministry of Culture of Georgia"
APP_ENV=production
APP_KEY=
APP_DEBUG=false
APP_URL=https://culture-backend.up.railway.app

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=error

DB_CONNECTION=sqlite
DB_DATABASE=/app/database/database.sqlite

BROADCAST_DRIVER=pusher
BROADCAST_CONNECTION=pusher
CACHE_DRIVER=file
FILESYSTEM_DISK=s3
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="\${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=eu-north-1
AWS_BUCKET=culture-ministry-images
AWS_URL=https://culture-ministry-images.s3.eu-north-1.amazonaws.com
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=2012529
PUSHER_APP_KEY=a31be237b5613a0a77c1
PUSHER_APP_SECRET=8b126b1a9e2075010eb7
PUSHER_HOST=
PUSHER_PORT=443
PUSHER_SCHEME=https
PUSHER_APP_CLUSTER=ap2
ASSET_URL=/public
VITE_APP_NAME="\${APP_NAME}"
VITE_PUSHER_APP_KEY="\${PUSHER_APP_KEY}"
VITE_PUSHER_APP_CLUSTER="\${PUSHER_APP_CLUSTER}"
EOF
    echo "Created .env file"
fi

# Generate application key if it's missing from .env
if grep -q "APP_KEY=$" /app/.env; then
    echo "Generating application key..."
    php artisan key:generate --force
fi

# Run migrations FIRST
echo "Running migrations..."
php artisan migrate --force

# Now clear caches
echo "Clearing caches..."
php artisan cache:clear || echo "Cache clear failed, but this is often safe to ignore."
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Run seeders
echo "Running seeders..."
php artisan db:seed --force

# Migrate existing images to S3
echo "Migrating existing images to S3..."
php migrate_existing_images.php

# Cache configuration
echo "Caching configuration..."
php artisan config:cache

# Create storage link if it doesn't exist
echo "Creating storage link..."
if [ ! -L /app/public/storage ]; then
    ln -sfn /app/storage/app/public /app/public/storage
    echo "Created storage symlink"
fi

echo "--- SETUP COMPLETE (S3 + Public Dir) ---"
echo "Starting PHP server..."

# Check if NIXPACKS_PHP_ROOT_DIR is set to /app/public
if [ "$NIXPACKS_PHP_ROOT_DIR" = "/app/public" ]; then
    echo "Using public directory as root..."
    cd /app/public
    exec php -S 0.0.0.0:$PORT index.php 2>&1
else
    echo "Using server.php from root directory..."
    cd /app
    exec php -S 0.0.0.0:$PORT server.php 2>&1
fi 