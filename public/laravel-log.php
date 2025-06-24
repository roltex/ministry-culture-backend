<?php
// Show the last 100 lines of the Laravel log file in the browser

$logFile = __DIR__ . '/../storage/logs/laravel.log';

header('Content-Type: text/plain');

echo "=== Last 100 lines of laravel.log ===\n\n";

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
        foreach ($buffer as $line) {
            echo $line;
        }
    } else {
        echo "Could not open log file for reading.\n";
    }
} else {
    echo "Log file not found: $logFile\n";
} 