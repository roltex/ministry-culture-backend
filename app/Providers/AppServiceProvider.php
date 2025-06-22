<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;

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
        // Configure SQLite to use UTF-8 encoding
        if (DB::connection()->getDriverName() === 'sqlite') {
            DB::connection()->getPdo()->exec('PRAGMA encoding = "UTF-8"');
        }
    }
}
