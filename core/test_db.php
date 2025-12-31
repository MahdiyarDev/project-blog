<?php

require __DIR__ . "/DataBase.php";

// تست اتصال sqlite
try {
    $db = new DataBase([
        'driver' => 'sqlite',
        'dbname' => __DIR__ . '/test.db',
    ]);

    // ایجاد جدول تست
    $db->query("CREATE TABLE IF NOT EXISTS users (id INTEGER PRIMARY KEY, name TEXT)");
    $db->query("INSERT INTO users (name) VALUES (:name)", ['name' => 'Mahdiyar']);

    $user = $db->fetch("SELECT * FROM users WHERE name = :name", ['name' => 'Mahdiyar']);
    var_dump($user);

    echo "Database test passed!\n";

} catch (Exception $e) {
    echo "Database test failed: " . $e->getMessage() . "\n";
}
