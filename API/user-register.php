<?php

require_once 'db-connection.php';

$reciviedJson = file_get_contents("php://input");
$data = json_decode($reciviedJson, true);

$fullName = $data['full_name'];
$email = $data['email'];
$password = $data['password'];

$query = "INSERT INTO `users`( `full_name`, `email`, `password`) VALUES (:full_name,:email,:password);";

$stmt = $connect->prepare($query);
$stmt->bindParam(":password", $password, PDO::PARAM_STR);
$stmt->bindParam(":full_name", $fullName, PDO::PARAM_STR);
$stmt->bindParam(":email", $email, PDO::PARAM_STR);

$jsonResponse = new stdClass();

if ($stmt->execute() && $stmt->rowCount() == 1) {
    $LAST_ID = $connect -> lastInsertId();
    $jsonResponse->is_ok = true;
    $jsonResponse->user_data = new stdClass();
    $jsonResponse->user_data->id = $LAST_ID;
    $jsonResponse->user_data->full_name = $fullName;
    $jsonResponse->user_data->email = $email;
} else {
    $jsonResponse->is_ok = false;
    $jsonResponse->error_msg = "Error: could not register your account please try later!";
}

echo json_encode($jsonResponse);
