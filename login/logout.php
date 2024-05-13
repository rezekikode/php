<?php

ini_set('display_errors', 1);

session_start();

session_destroy();

setcookie('remember_token', '', time() - 3600, '/'); // Expire the cookie

header("Location: index.php");