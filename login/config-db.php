<?php

require_once __DIR__ . '/class/Database.php';

$db = null;

// Database configuration
try {
    // Database
    $db = new Database();

    // MySQL
    $db->addConnection('db_mysql', 'localhost', 'testdb', 'root', 'root');

    // SQLite
    $database = __DIR__ . '/database.db';
    $db->addConnection('db_sqlite', 'sqlite', $database, null, null, 'sqlite');
} catch (Exception $e) {
    die($e->getMessage());
}
