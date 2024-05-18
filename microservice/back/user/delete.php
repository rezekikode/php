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

    // Check if the required data is present
    if (empty($data['id'])) {
        echo json_encode([
            'status' => 'error',
            'message' => 'User ID is required',
            'data' => [],
        ]);
        exit;
    }

    // Prepare and execute the delete query
    $stmt = $pdo->prepare('DELETE FROM users WHERE id = :user_id');
    $stmt->bindParam(':user_id', $data['id']);
    $stmt->execute();

    // Check if the delete operation was successful
    if ($stmt->rowCount() > 0) {
        echo json_encode([
            'status' => 'success',
            'message' => 'User deleted',
            'data' => [],
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