<?php

echo "🚀 Railway Database Setup Helper\n";
echo "===============================\n\n";

echo "To get your Railway database credentials:\n";
echo "1. Go to your Railway project dashboard\n";
echo "2. Find your database plugin (MySQL/PostgreSQL)\n";
echo "3. Click on the 'Connect' tab\n";
echo "4. Copy the connection details\n\n";

echo "Once you have the credentials, I'll help you update the .env file.\n\n";

// Read current .env
$envFile = '.env';
$content = file_get_contents($envFile);

echo "Current database configuration:\n";
$lines = explode("\n", $content);
foreach ($lines as $line) {
    if (strpos($line, 'DB_') === 0) {
        echo "  " . $line . "\n";
    }
}

echo "\n";

// Check if we need to install MySQL extension
if (!extension_loaded('pdo_mysql')) {
    echo "⚠️  MySQL extension not found. You may need to install it:\n";
    echo "   For macOS: brew install php@8.1-mysql\n";
    echo "   For Ubuntu: sudo apt-get install php-mysql\n";
    echo "   For Windows: Enable pdo_mysql in php.ini\n\n";
}

echo "Would you like me to:\n";
echo "1. Test the current database connection\n";
echo "2. Show you how to get Railway credentials\n";
echo "3. Create a template for you to fill in\n\n";

echo "Enter your choice (1-3): ";
$handle = fopen("php://stdin", "r");
$choice = trim(fgets($handle));
fclose($handle);

switch ($choice) {
    case '1':
        echo "\nTesting current database connection...\n";
        try {
            $app = require_once 'bootstrap/app.php';
            $app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();
            
            $connection = config('database.default');
            $host = config('database.connections.' . $connection . '.host');
            
            echo "Current connection: $connection\n";
            echo "Current host: $host\n";
            
            if ($host === 'your-railway-db-host') {
                echo "❌ Still using placeholder values. Please update your .env file first.\n";
            } else {
                echo "✅ Using custom host: $host\n";
                echo "Testing connection...\n";
                
                try {
                    \DB::connection()->getPdo();
                    echo "✅ Database connection successful!\n";
                } catch (Exception $e) {
                    echo "❌ Database connection failed: " . $e->getMessage() . "\n";
                }
            }
        } catch (Exception $e) {
            echo "❌ Error: " . $e->getMessage() . "\n";
        }
        break;
        
    case '2':
        echo "\n📋 How to get Railway Database Credentials:\n";
        echo "==========================================\n\n";
        echo "1. Go to https://railway.app/dashboard\n";
        echo "2. Select your project\n";
        echo "3. Find your database plugin (MySQL/PostgreSQL)\n";
        echo "4. Click on the plugin to open its details\n";
        echo "5. Go to the 'Connect' tab\n";
        echo "6. You'll see connection details like:\n";
        echo "   - Host: mysql.railway.internal\n";
        echo "   - Port: 3306\n";
        echo "   - Database: railway\n";
        echo "   - Username: root\n";
        echo "   - Password: (long string)\n\n";
        echo "7. Copy these values to your .env file\n\n";
        break;
        
    case '3':
        echo "\n📝 Here's what your .env database section should look like:\n";
        echo "========================================================\n\n";
        echo "DB_CONNECTION=mysql\n";
        echo "DB_HOST=mysql.railway.internal\n";
        echo "DB_PORT=3306\n";
        echo "DB_DATABASE=railway\n";
        echo "DB_USERNAME=root\n";
        echo "DB_PASSWORD=your-actual-password-here\n\n";
        echo "Replace the values with your actual Railway credentials!\n\n";
        break;
        
    default:
        echo "Invalid choice. Please run the script again.\n";
}

echo "\nAfter updating your .env file, run:\n";
echo "php artisan config:clear\n";
echo "php artisan cache:clear\n";
echo "php check_db_connection.php\n\n"; 