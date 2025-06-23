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

if ($uri !== '/' && file_exists($public_path_check)) {
    $log_message .= "    -> File found. Serving directly."."\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);
    return false;
}

$log_message .= "    -> File not found. Handing over to Laravel's index.php."."\n\n";
file_put_contents($log_file, $log_message, FILE_APPEND);

require_once __DIR__.'/public/index.php'; 