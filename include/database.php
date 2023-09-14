<?php

$dsn = "mysql:host=localhost;dbname=receipe";
$dbusername = "root";
$dbpassword = "";
try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    // set the PDO error mode to exception

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
