<?php

require_once 'db-connection.php';

$reciviedJson = file_get_contents("php://input");
$data = json_decode($reciviedJson, true);

$id = $data['id'];
$status = $data['status'];

$query = "UPDATE `users` SET  `status` = :status WHERE `id`= :id";

$stmt = $connect->prepare($query);
$stmt->bindParam(":status", $status, PDO::PARAM_STR);
$stmt->bindParam(":id", $id, PDO::PARAM_INT);

if ($stmt->execute()) {
    echo "Status Updated Successfully!";
} else {
    echo "Status Update Faild!";
}
