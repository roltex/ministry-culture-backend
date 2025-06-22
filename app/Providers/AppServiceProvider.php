<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Only configure SQLite if database exists and we can connect
        try {
            if (DB::connection()->getDriverName() === 'sqlite' && 
                file_exists(database_path('database.sqlite'))) {
                DB::connection()->getPdo()->exec('PRAGMA encoding = "UTF-8"');
            }
        } catch (\Exception $e) {
            // Silently ignore database connection errors during startup
            // This prevents the app from crashing if database is not available
        }
    }
}
