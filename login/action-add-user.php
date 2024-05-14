<?php

ini_set('display_errors', 1);

session_start();

require_once __DIR__ . '/config-db.php';

$db->setActiveConnection('db_sqlite');

if (!isset($_POST['email'])) {
    echo 'Email is required';
    exit;
}

if (!isset($_POST['password'])) {
    echo 'Password is required';
    exit;
}

if (empty($_POST['email'])) {
    echo 'Email is required';
    exit;
}

if (empty($_POST['password'])) {
    echo 'Password is required';
    exit;
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    echo 'Invalid email address';
    exit;
}

if (strlen($_POST['password']) < 8) {
    echo 'Password must be at least 8 characters';
    exit;
}

$query = "SELECT * FROM users WHERE email = :email";

$params = [
    'email' => $_POST['email'],
];

$user = $db->fetch($query, $params);

if (!$user) {
    $query = "INSERT INTO users (email, password) VALUES (:email, :password)";

    $params = [
        'email' => $_POST['email'],
        'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
    ];

    $db->execute($query, $params);

    echo 1;
} else {
    echo 'User already exists';
}

$db->close();