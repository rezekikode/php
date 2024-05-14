<?php

require_once __DIR__ . '/class/Database.php';

$db = null;

try {
    $db = new Database();
    $db->addConnection('db_mysql', 'localhost','testdb', 'root', 'root');

    $database = __DIR__ . '/database.db';
    $db->addConnection('db_sqlite', 'sqlite', $database, null, null, 'sqlite');    
} catch (Exception $e) {
    die($e->getMessage());
}