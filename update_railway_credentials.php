<?php

echo "🔧 Railway Database Credentials Updater\n";
echo "======================================\n\n";

echo "This script will help you update your .env file with Railway database credentials.\n\n";

echo "Please enter your Railway database credentials:\n\n";

echo "Host (e.g., mysql.railway.internal): ";
$handle = fopen("php://stdin", "r");
$host = trim(fgets($handle));

echo "Port (usually 3306 for MySQL, 5432 for PostgreSQL): ";
$port = trim(fgets($handle));

echo "Database name: ";
$database = trim(fgets($handle));

echo "Username: ";
$username = trim(fgets($handle));

echo "Password: ";
$password = trim(fgets($handle));

fclose($handle);

echo "\nUpdating .env file...\n";

// Read current .env
$envFile = '.env';
$content = file_get_contents($envFile);

// Update the credentials
$content = str_replace('DB_HOST=your-railway-db-host', "DB_HOST=$host", $content);
$content = str_replace('DB_PORT=3306', "DB_PORT=$port", $content);
$content = str_replace('DB_DATABASE=your-railway-db-name', "DB_DATABASE=$database", $content);
$content = str_replace('DB_USERNAME=your-railway-username', "DB_USERNAME=$username", $content);
$content = str_replace('DB_PASSWORD=your-railway-password', "DB_PASSWORD=$password", $content);

// Write back to .env
file_put_contents($envFile, $content);

echo "✅ .env file updated successfully!\n\n";

echo "Updated database configuration:\n";
$lines = explode("\n", $content);
foreach ($lines as $line) {
    if (strpos($line, 'DB_') === 0) {
        echo "  " . $line . "\n";
    }
}

echo "\nNow clearing Laravel cache...\n";
system('php artisan config:clear');
system('php artisan cache:clear');

echo "\n✅ Cache cleared!\n\n";

echo "Testing database connection...\n";
try {
    $app = require_once 'bootstrap/app.php';
    $app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();
    
    \DB::connection()->getPdo();
    echo "✅ Database connection successful!\n\n";
    
    echo "Checking news count...\n";
    $newsCount = \App\Models\News::count();
    echo "✅ Found $newsCount news items in the database!\n\n";
    
    echo "🎉 Setup complete! Your local API should now show the same news as your admin panel.\n";
    
} catch (Exception $e) {
    echo "❌ Database connection failed: " . $e->getMessage() . "\n";
    echo "Please check your credentials and try again.\n";
} 