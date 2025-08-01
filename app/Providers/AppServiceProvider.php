<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;


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
        // Force HTTPS for assets in production
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        // Configure FileUpload to use the environment-specified disk
        FileUpload::configureUsing(function (FileUpload $component): void {
            $component->disk(config('filesystems.default'));
        });

        // Configure ImageColumn to use the environment-specified disk
        ImageColumn::configureUsing(function (ImageColumn $component): void {
            $component->disk(config('filesystems.default'));
        });







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
