<?php

ini_set('display_errors', 1);

header('Content-Type: application/json');

require_once __DIR__ . '/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = isset($_GET['id']) ? $_GET['id'] : null;

    if (empty($id)) {
        echo json_encode([
            'status' => 'error',
            'message' => 'ID is required',
            'data' => [],
        ]);
        exit;
    }
    
    $stmt = $pdo->prepare('SELECT email, password FROM users WHERE id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        echo json_encode([
            'status' => 'success',
            'message' => 'User found',
            'data' => $user,
        ]);
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'User not found',
            'data' => [],
        ]);
    }
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'Method not allowed',
        'data' => [],
    ]);
}
