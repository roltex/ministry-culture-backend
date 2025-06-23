#!/bin/bash

set -e  # Exit on any error

echo "Starting Laravel application setup..."

# Create .env file if it doesn't exist
if [ ! -f /app/.env ]; then
    echo "Creating .env file..."
    cat > /app/.env << EOF
APP_NAME="Ministry of Culture and Sport"
APP_ENV=production
APP_KEY=
APP_DEBUG=false
APP_URL=https://culture-georgia.railway.app/

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
    echo "Generating application key..."
    php artisan key:generate --force
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

# Start the application with the Laravel router script
exec php -S 0.0.0.0:$PORT server.php 