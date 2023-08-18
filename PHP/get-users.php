<?php

function getResponse(){
// Include the database connection file
require 'db-connection.php';

$query = "SELECT * FROM `users`";

$stmt  = $connect->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll();
return $result;

}


function printResponse(){

$jsonResponse = json_encode(getResponse());
echo $jsonResponse;

}