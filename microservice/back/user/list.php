<?php

ini_set('display_errors', 1);

header('Content-Type: application/json');

require_once __DIR__ . '/db.php';

if ($pdo) {
    $stmt = $pdo->query('SELECT * FROM users');
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode([
        'status' => 'success',
        'message' => 'Users list',
        'data' => $users
    ]);
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'Could not connect to the database',
        'data' => []
    ]);
}