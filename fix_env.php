<?php

$envFile = '.env';
$content = file_get_contents($envFile);

// Replace the database configuration
$content = str_replace('DB_CONNECTION=sqlite', 'DB_CONNECTION=mysql', $content);
$content = str_replace('DB_DATABASE=../database/database.sqlite', 'DB_HOST=your-railway-db-host', $content);

// Add the missing database configuration lines
$content = str_replace(
    '# DB_HOST=127.0.0.1',
    'DB_PORT=3306',
    $content
);

$content = str_replace(
    '# DB_PORT=3306',
    'DB_DATABASE=your-railway-db-name',
    $content
);

$content = str_replace(
    '# DB_DATABASE=laravel',
    'DB_USERNAME=your-railway-username',
    $content
);

$content = str_replace(
    '# DB_USERNAME=root',
    'DB_PASSWORD=your-railway-password',
    $content
);

$content = str_replace(
    '# DB_PASSWORD=',
    '# Local SQLite (commented out)',
    $content
);

file_put_contents($envFile, $content);

echo "✅ .env file updated!\n";
echo "⚠️  You need to replace these placeholders with your actual Railway database credentials:\n";
echo "   - your-railway-db-host\n";
echo "   - your-railway-db-name\n";
echo "   - your-railway-username\n";
echo "   - your-railway-password\n\n";

echo "Current database section in .env:\n";
$lines = explode("\n", $content);
foreach ($lines as $line) {
    if (strpos($line, 'DB_') === 0) {
        echo $line . "\n";
    }
} 