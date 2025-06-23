#!/bin/bash

set -e  # Exit on any error

echo "--- STARTUP SCRIPT V3 ---"
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
APP_NAME="Ministry of Culture and Sport"
APP_ENV=production
APP_KEY=
APP_DEBUG=false
APP_URL=https://culture-backend.up.railway.app

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=error

DB_CONNECTION=sqlite
DB_DATABASE=/app/database/database.sqlite

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=public
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
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_HOST=
PUSHER_PORT=443
PUSHER_SCHEME=https
PUSHER_APP_CLUSTER=mt1

VITE_APP_NAME="\${APP_NAME}"
VITE_PUSHER_APP_KEY="\${PUSHER_APP_KEY}"
VITE_PUSHER_HOST="\${PUSHER_HOST}"
VITE_PUSHER_PORT="\${PUSHER_PORT}"
VITE_PUSHER_SCHEME="\${PUSHER_SCHEME}"
VITE_PUSHER_APP_CLUSTER="\${PUSHER_APP_CLUSTER}"
EOF
    echo "Created .env file"
fi

# Generate application key if it's missing from .env
if grep -q "APP_KEY=$" /app/.env; then
    echo "Generating application key..."
    php artisan key:generate --force
fi

# Create storage link
echo "Creating storage link..."
ln -sfn /app/storage/app/public /app/public/storage

# Ensure the storage link exists
echo "Ensuring storage link..."
php artisan storage:link >/dev/null 2>&1 || true

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

# Cache configuration
echo "Caching configuration..."
php artisan config:cache

echo "--- SETUP COMPLETE ---"
echo "Starting PHP server..."
# Start the application with the Laravel router script and redirect stderr to stdout
exec php -S 0.0.0.0:$PORT server.php 2>&1 