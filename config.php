<?php
// config.php

// Database configuration
$host = 'localhost';
$db_name = 'university_db';
$username = 'root';
$password = 'new_password';

// Create a new PDO instance
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>
