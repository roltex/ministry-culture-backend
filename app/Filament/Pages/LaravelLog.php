<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class LaravelLog extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'ჟურნალი';
    protected static ?string $navigationGroup = 'სისტემის მართვა';
    protected static ?int $navigationSort = 99;
    protected static string $view = 'filament.pages.laravel-log';

    public $laravelLogContent = '';
    public $filamentLogContent = '';

    public function mount()
    {
        // Check if user is admin
        if (!auth()->user()?->is_admin) {
            abort(403, 'Access denied. Admin privileges required.');
        }

        $this->laravelLogContent = $this->getLogContent(storage_path('logs/laravel.log'));
        $this->filamentLogContent = $this->getLogContent(storage_path('logs/filament.log'));
    }

    public static function canAccess(): bool
    {
        return auth()->user()?->is_admin ?? false;
    }

    private function getLogContent($logFile)
    {
        if (file_exists($logFile)) {
            $lines = [];
            $fp = fopen($logFile, 'r');
            if ($fp) {
                $buffer = [];
                while (!feof($fp)) {
                    $buffer[] = fgets($fp);
                    if (count($buffer) > 100) {
                        array_shift($buffer);
                    }
                }
                fclose($fp);
                $lines = $buffer;
            }
            return implode('', $lines);
        } else {
            return "Log file not found: $logFile";
        }
    }
} 