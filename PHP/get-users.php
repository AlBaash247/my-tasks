<?php
// Include the database connection file
require 'db-connection.php';

// For example:
$stmt = $connect->prepare("SELECT * FROM users");
$stmt->execute();
$result = $stmt->fetchAll();

print_r($result);

