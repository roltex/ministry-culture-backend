<?php

require_once __DIR__.'/../vendor/autoload.php';

try {
    $app = require_once __DIR__.'/../bootstrap/app.php';
    
    echo json_encode([
        'status' => 'ok',
        'message' => 'Laravel bootstrap successful',
        'timestamp' => date('c'),
        'environment' => $app->environment()
    ]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage(),
        'file' => $e->getFile(),
        'line' => $e->getLine(),
        'timestamp' => date('c')
    ]);
} 