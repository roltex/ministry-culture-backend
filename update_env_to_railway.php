<?php

// Read the current .env file
$envPath = __DIR__ . '/.env';
$envContent = file_get_contents($envPath);

echo "Current .env file content:\n";
echo "==========================\n";
echo $envContent . "\n\n";

// Replace the database configuration
$newEnvContent = preg_replace(
    '/DB_CONNECTION=sqlite\s+DB_DATABASE=\.\.\/database\/database\.sqlite\s+# DB_HOST=127\.0\.0\.1\s+# DB_PORT=3306\s+# DB_DATABASE=laravel\s+# DB_USERNAME=root\s+# DB_PASSWORD=/',
    'DB_CONNECTION=mysql
DB_HOST=your-railway-db-host
DB_PORT=3306
DB_DATABASE=your-railway-db-name
DB_USERNAME=your-railway-username
DB_PASSWORD=your-railway-password',
    $envContent
);

// Write the updated content back to .env
file_put_contents($envPath, $newEnvContent);

echo "Updated .env file content:\n";
echo "==========================\n";
echo $newEnvContent . "\n\n";

echo "✅ .env file has been updated to use Railway database!\n";
echo "⚠️  IMPORTANT: You need to replace the placeholder values with your actual Railway database credentials:\n";
echo "   - your-railway-db-host\n";
echo "   - your-railway-db-name\n";
echo "   - your-railway-username\n";
echo "   - your-railway-password\n\n";
echo "You can find these in your Railway dashboard under the database plugin's 'Connect' tab.\n"; 