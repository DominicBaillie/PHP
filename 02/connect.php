<?php

declare(strict_types=1);

$host = "localhost";
$db = "test_connection";
$user = "root";
$pass = "";

try 
{
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
}
catch (PDOException $e) 
{
    echo "Connection failed: " . $e->getMessage();
}