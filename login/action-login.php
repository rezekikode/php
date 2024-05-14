<?php

ini_set('display_errors', 1);

// Include config file
require_once __DIR__ . '/config-db.php';

$db->setActiveConnection('db_sqlite');

// Define variables and initialize with empty values
$email = $password = "";
$email_err = $password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter email.";
    } else {
        $email = trim($_POST["email"]);
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Check input errors before processing the login
    if (empty($email_err) && empty($password_err)) {
        // Your authentication logic goes here
        // For demonstration purposes, let's just check if email and password match
        // This is not secure and should not be used in production

        $query = "SELECT * FROM users WHERE email = :email";

        $params = [
            ':email' => $email
        ];

        $user = $db->fetch($query, $params);

        if ($user) {
            if (password_verify($password, $user['password'])) {
                // Authentication successful
                // Create a session and redirect to the dashboard
                session_start();

                // Generate a random token
                $token = bin2hex(random_bytes(32));

                // Store the token in a cookie
                setcookie('remember_token', $token, time() + (86400 * 30), '/'); // Cookie expires in 30 days

                $_SESSION['user'] = $user['id'];
                echo "1";
            } else {
                // Authentication failed
                echo "Invalid email or password. Please try again.";
            }
        } else {
            // Authentication failed
            echo "Invalid email or password. Please try again.";
        }        
    } else if (!empty($email_err)) {
        echo $email_err;
    } else if (!empty($password_err)) {
        echo $password_err;
    } else {
        echo "An error occurred. Please try again.";
    }
}

$db->close();
