<?php

function getResponse(){
// Include the database connection file
require 'db-connection.php';
$stmt = $connect->prepare("SELECT * FROM users");
$stmt->execute();
$result = $stmt->fetchAll();

return $result;
}

function printResponse(){
    
$jsonResponse = json_encode(getResponse());
echo $jsonResponse;
}



