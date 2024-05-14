<?php

ini_set('display_errors', 1);

session_start();

// Include config file
require_once __DIR__ . '/config-db.php';

$db->setActiveConnection('db_sqlite');

// Get the user ID from the session or any other source
$userID = $_SESSION['user'];

// Get the updated profile data from the form or any other source
$email = $_POST['email'];
$old_password = $_POST['old_password'];
$new_password = $_POST['new_password'];

if (empty($email)) {
    echo "Email is required.";
    exit;
}

if (empty($old_password)) {
    echo "Old password is required.";
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email address.";
    exit;
}

if (!empty($new_password) && strlen($new_password) < 8) {
    echo "Password must be at least 8 characters long.";
    exit;
}

if (!empty($new_password) && $old_password === $new_password) {
    echo "New password must be different from the old password.";
    exit;
}

$query = "SELECT email, password FROM users WHERE id = ?";

$params = [
    $userID
];

$user = $db->fetch($query, $params);

if (!$user) {
    echo "User not found.";
    exit;
}

if (!password_verify($old_password, $user['password'])) {
    echo "Old password is incorrect.";
    exit;
}

if (!empty($new_password)) {
    $new_password = password_hash($new_password, PASSWORD_DEFAULT);
} else {
    $new_password = $user['password'];
}

// Prepare the SQL statement
$query = "UPDATE users SET email = ?, password = ? WHERE id = ?";

$params = [
    $email,
    $new_password,
    $userID
];

// Execute the SQL statement
if ($db->execute($query, $params)) {
    echo "1";
} else {
    echo "Failed to update profile.";
}

$db->close();    