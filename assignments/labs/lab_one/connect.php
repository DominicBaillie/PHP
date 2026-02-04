<?php

declare(strict_types=1);

// Database connection info
$host = 'localhost';
$db = 'test_connection';
$user = 'root';
$pass = 'password';
//I used a costum port, so needed to learn a new $dsn (I was really struggling getting this to work)
$dsn = "mysql:host=$host;port=3307;dbname=$db;charset=utf8mb4";


try 
{
    // Create new PDO
    $pdo = new PDO($dsn, $user, $pass);
    // Set error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Success message
    echo "Connected successfully";
}

catch (PDOException $e) 
{
    // Failure message
    die("Connection failed: " . $e->getMessage());
}