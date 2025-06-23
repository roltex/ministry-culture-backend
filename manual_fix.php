<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "=== Manual Fix Script ===\n";

// 1. Fix admin user
echo "1. Fixing admin user...\n";
$user = \App\Models\User::where('email', 'roland.esakia@gmail.com')->first();
if ($user) {
    $user->update(['is_admin' => true, 'is_active' => true]);
    echo "✅ Admin user updated\n";
} else {
    \App\Models\User::create([
        'name' => 'Roland Esakia',
        'email' => 'roland.esakia@gmail.com',
        'password' => bcrypt('Roltex123'),
        'email_verified_at' => now(),
        'is_admin' => true,
        'is_active' => true,
    ]);
    echo "✅ Admin user created\n";
}

// 2. Create storage link
echo "2. Creating storage link...\n";
if (!file_exists('public/storage')) {
    system('php artisan storage:link');
    echo "✅ Storage link created\n";
} else {
    echo "✅ Storage link exists\n";
}

// 3. Publish Filament assets
echo "3. Publishing Filament assets...\n";
system('php artisan vendor:publish --tag=filament-assets --force');
echo "✅ Filament assets published\n";

// 4. Clear caches
echo "4. Clearing caches...\n";
system('php artisan config:clear');
system('php artisan route:clear');
system('php artisan view:clear');
echo "✅ Caches cleared\n";

echo "\n=== Fix Complete ===\n";
echo "You should now be able to:\n";
echo "1. Access https://culture-backend.up.railway.app/admin/login\n";
echo "2. Log in with roland.esakia@gmail.com / Roltex123\n";
echo "3. See the properly styled Filament admin panel\n"; 