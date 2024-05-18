<?php

ini_set('display_errors', 1);

header('Content-Type: application/json');

require_once __DIR__ . '/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    if (empty($data)) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Data is empty',
            'data' => [],
        ]);
        exit;
    }

    if (filter_var($data['email'], FILTER_VALIDATE_EMAIL) === false) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Email is invalid',
            'data' => [],
        ]);
        exit;
    }

    if (strlen($data['password']) < 8) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Password is too short',
            'data' => [],
        ]);
        exit;
    }

    $stmt = $pdo->prepare('INSERT INTO users (email, password) VALUES (:email, :password)');
    $stmt->execute([
        ':email' => $data['email'],
        ':password' => $data['password'],
    ]);

    echo json_encode([
        'status' => 'success',
        'message' => 'User created',
        'data' => [
            'id' => $pdo->lastInsertId(),
            'email' => $data['email'],
        ],
    ]);
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'Method not allowed',
        'data' => [],
    ]);
}