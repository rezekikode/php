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
$password = $_POST['password'];

// Prepare the SQL statement
$query = "UPDATE users SET email = ?, password = ? WHERE id = ?";

$params = [
    $email,
    $password,
    $userID
];

// Execute the SQL statement
if ($db->execute($query, $params)) {
    echo "1";
} else {
    echo "Failed to update profile.";
}