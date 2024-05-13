<?php

session_destroy();

setcookie('remember_token', '', time() - 3600, '/'); // Expire the cookie

header("Location: index.php");