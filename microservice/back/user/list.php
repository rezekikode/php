<?php

ini_set('display_errors', 1);

header('Content-Type: application/json');

require_once __DIR__ . '/db.php';
require_once __DIR__ . '/../class/Response.php';

try {
    $stmt = $pdo->query('SELECT * FROM users');
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    Response::success('Users list', $users);
} catch (PDOException $e) {
    Response::error($e->getMessage());
}