<?php

ini_set('display_errors', 1);

session_start();

require_once __DIR__ . '/config-db.php';

$db->setActiveConnection('db_sqlite');

if (!isset($_POST['id'])) {
    echo 'User ID is required';
    exit;
}

$query = "DELETE FROM users WHERE id = :id";

$params = [
    'id' => $_POST['id'],
];

$db->execute($query, $params);

echo 1;