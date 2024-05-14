<?php

require_once __DIR__ . '/class/Database.php';

$db = null;

try {
    $db = new Database();
    $db->addConnection('db_mysql', 'localhost','testdb', 'root', 'root');
    $db->addConnection('db_sqlite', 'sqlite','database.db', null, null, 'sqlite');    
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}