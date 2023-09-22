<?php

require_once 'db-connection.php';

$reciviedJson = file_get_contents("php://input");
$data = json_decode($reciviedJson, true);

$email = $data['email'];
$password = $data['password'];

$query = "SELECT * FROM `users` WHERE lower(`email`) = lower(:email) AND `password` = :password;";

$stmt = $connect->prepare($query);
$stmt->bindParam(":password", $password, PDO::PARAM_STR);
$stmt->bindParam(":email", $email, PDO::PARAM_STR);

$jsonResponse = new stdClass();

if ($stmt->execute() && $stmt->rowCount() == 1) {
   $jsonResponse-> is_ok = true;
   $jsonResponse-> user_data = $stmt->fetchAll()[0];
} else {
    $jsonResponse-> is_ok = false;
    $jsonResponse-> error_msg = "email or password missmatch!";
}

echo json_encode($jsonResponse);