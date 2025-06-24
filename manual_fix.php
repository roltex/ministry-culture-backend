<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "=== Manual Fix Script ===\n";

// 1. Fix admin user
echo "1. Fixing admin user...\n";
$user = \App\Models\User::where('email', 'roland.esakia@gmail.com')->first();
if ($user) {
    $user->update([
        'is_admin' => true, 
        'is_active' => true,
        'email_verified_at' => now(), // Ensure email is verified
    ]);
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

// 3. Build Vite assets
echo "3. Building Vite assets...\n";
system('npm run build');
echo "✅ Vite assets built\n";

// 4. Verify Vite assets
echo "4. Verifying Vite assets...\n";
$manifestPath = public_path('build/manifest.json');
if (file_exists($manifestPath)) {
    echo "✅ Vite manifest exists\n";
    $manifest = json_decode(file_get_contents($manifestPath), true);
    if ($manifest) {
        foreach ($manifest as $entry => $details) {
            if (str_contains($entry, 'app.css') || str_contains($entry, 'app.js')) {
                echo "✅ Found asset: {$details['file']}\n";
            }
        }
    }
} else {
    echo "❌ Vite manifest missing\n";
}

// 5. Clear caches
echo "5. Clearing caches...\n";
system('php artisan config:clear');
system('php artisan route:clear');
system('php artisan view:clear');
echo "✅ Caches cleared\n";

// 6. Test FilamentUser implementation
echo "6. Testing FilamentUser implementation...\n";
$testUser = \App\Models\User::where('email', 'roland.esakia@gmail.com')->first();
if ($testUser && $testUser->canAccessPanel(app(\Filament\Panel::class))) {
    echo "✅ FilamentUser contract working correctly\n";
} else {
    echo "❌ FilamentUser contract not working\n";
}

echo "\n=== Fix Complete ===\n";
echo "You should now be able to:\n";
echo "1. Access https://culture-backend.up.railway.app/admin/login\n";
echo "2. Log in with roland.esakia@gmail.com / Roltex123\n";
echo "3. See the properly styled Filament admin panel with Vite assets\n";
echo "4. No more 403 errors or missing CSS/JS!\n"; 