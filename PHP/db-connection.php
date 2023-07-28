<?php
// Database configuration
$dbHost = 'localhost';     
$dbName = 'my_tasks_db';     // Change this to your actual database name
$dbUser = 'root'; // Change this to your actual database username
$dbPass = ''; // Change this to your actual database password

// PDO connection using try-catch block
try {
    $connect = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    // Add any other PDO configuration settings if needed
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}