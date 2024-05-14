<?php

ini_set('display_errors', 1);

require_once __DIR__ . '/../config-db.php';

$db->setActiveConnection('db_sqlite');

$users =
    "
    CREATE TABLE IF NOT EXISTS users 
    (
        id INTEGER PRIMARY KEY,
        email TEXT NOT NULL,
        password TEXT NOT NULL
    )
    ";

$db->execute($users);

$users = "INSERT INTO users (email, password) VALUES ('test@example.com', 'password')";

$db->execute($users);

$db->close();

echo 'Migration successful.';
