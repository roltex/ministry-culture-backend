<?php

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

$log_file = __DIR__ . '/storage/logs/server-debug.log';

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

// This file allows us to emulate Apache's "mod_rewrite" functionality from the
// built-in PHP web server. This provides a convenient way to test a Laravel
// application without having installed a "real" web server software here.
$public_path_check = __DIR__.'/public'.$uri;

$log_message = '['.date('Y-m-d H:i:s').'] Request URI: '.$uri."\n".
               '    -> Checking for file: '.$public_path_check."\n";

// Check if the file exists in public directory
if ($uri !== '/' && file_exists($public_path_check)) {
    $log_message .= "    -> File found. Serving directly."."\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);
    return false;
}

// Special handling for storage files - check if it's a storage request
if (strpos($uri, '/storage/') === 0) {
    // Remove /storage/ prefix and check in storage/app/public
    $storage_path = __DIR__ . '/storage/app/public' . substr($uri, 8);
    $log_message .= "    -> Storage request detected. Checking: " . $storage_path . "\n";
    
    if (file_exists($storage_path)) {
        $log_message .= "    -> Storage file found. Serving directly."."\n";
        file_put_contents($log_file, $log_message, FILE_APPEND);
        
        // Get file info
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime_type = finfo_file($finfo, $storage_path);
        finfo_close($finfo);
        
        // Set appropriate headers
        header('Content-Type: ' . $mime_type);
        header('Content-Length: ' . filesize($storage_path));
        header('Cache-Control: public, max-age=31536000');
        
        // Output the file
        readfile($storage_path);
        exit;
    } else {
        $log_message .= "    -> Storage file not found."."\n";
    }
}

$log_message .= "    -> File not found. Handing over to Laravel's index.php."."\n\n";
file_put_contents($log_file, $log_message, FILE_APPEND);

require_once __DIR__.'/public/index.php'; 