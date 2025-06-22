<?php
header('Content-Type: application/json');

try {
    echo json_encode([
        'status' => 'ok',
        'timestamp' => date('c'),
        'php_version' => PHP_VERSION,
        'server' => $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown'
    ]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage(),
        'timestamp' => date('c')
    ]);
} 