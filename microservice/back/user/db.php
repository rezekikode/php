<?php

$hostname = 'localhost';
$username = 'root';
$password = 'root';
$dbname = 'testdb';

try {
    $pdo = new pdo("mysql:host=$hostname;dbname=$dbname", $username, $password);
} catch (PDOException $e) {
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
    exit();
}