<?php
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter username.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Check input errors before processing the login
    if (empty($username_err) && empty($password_err)) {
        // Your authentication logic goes here
        // For demonstration purposes, let's just check if username and password match
        // This is not secure and should not be used in production
        $valid_username = 'admin';
        $valid_password = 'password';

        if ($username === $valid_username && $password === $valid_password) {
            // Authentication successful
            echo "Login successful! Welcome, $username!";
        } else {
            // Authentication failed
            echo "Invalid username or password. Please try again.";
        }
    } else if (!empty($username_err)) {
        echo $username_err;
    } else if (!empty($password_err)) {
        echo $password_err;
    } else {
        echo "An error occurred. Please try again.";
    }
}
