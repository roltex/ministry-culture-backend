<?php

echo "🔄 Reverting to Local Database Setup\n";
echo "===================================\n\n";

// Read current .env
$envFile = '.env';
$content = file_get_contents($envFile);

// Revert back to SQLite
$content = str_replace('DB_CONNECTION=mysql', 'DB_CONNECTION=sqlite', $content);
$content = str_replace('DB_HOST=your-railway-db-host', 'DB_DATABASE=../database/database.sqlite', $content);
$content = str_replace('DB_PORT=3306', '# DB_PORT=3306', $content);
$content = str_replace('DB_DATABASE=your-railway-db-name', '# DB_DATABASE=laravel', $content);
$content = str_replace('DB_USERNAME=your-railway-username', '# DB_USERNAME=root', $content);
$content = str_replace('DB_PASSWORD=your-railway-password', '# DB_PASSWORD=', $content);

// Write back to .env
file_put_contents($envFile, $content);

echo "✅ Reverted to local SQLite database!\n\n";

echo "Current database configuration:\n";
$lines = explode("\n", $content);
foreach ($lines as $line) {
    if (strpos($line, 'DB_') === 0) {
        echo "  " . $line . "\n";
    }
}

echo "\nClearing Laravel cache...\n";
system('php artisan config:clear');
system('php artisan cache:clear');

echo "✅ Cache cleared!\n\n";

echo "Setting up local database...\n";

// Run migrations and seeders
echo "Running migrations...\n";
system('php artisan migrate:fresh --seed');

echo "\n✅ Local database setup complete!\n\n";

echo "Testing database connection...\n";
try {
    $app = require_once 'bootstrap/app.php';
    $app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();
    
    $newsCount = \App\Models\News::count();
    echo "✅ Found $newsCount news items in local database!\n\n";
    
    echo "🎉 Local setup complete! Now you can:\n";
    echo "1. Run your local Laravel server: php artisan serve\n";
    echo "2. Access your admin panel locally\n";
    echo "3. Both admin panel and API will use the same local database\n";
    echo "4. Add news from admin panel and see them in API immediately\n\n";
    
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
} 