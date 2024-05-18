<?php

ini_set('display_errors', 1);

header('Content-Type: application/json');

require_once __DIR__ . '/db.php';

echo json_encode([
    'status' => 'success',
    'message' => 'User microservice is running!'
]);