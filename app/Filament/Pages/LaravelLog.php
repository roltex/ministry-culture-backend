<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class LaravelLog extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Logs';
    protected static string $view = 'filament.pages.laravel-log';

    public $laravelLogContent = '';
    public $filamentLogContent = '';

    public function mount()
    {
        $this->laravelLogContent = $this->getLogContent(storage_path('logs/laravel.log'));
        $this->filamentLogContent = $this->getLogContent(storage_path('logs/filament.log'));
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