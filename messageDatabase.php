<?php
session_start();
require 'database.php';

$sender_id = $_POST["sender_id"];
$reciever_id = $_POST["reciever_id"];
$message = $_POST["message"];

//csrf check, used 330 wiki for this
if (!hash_equals($_SESSION['token'], $_POST['token'])) {
    die("Request forgery detected");
}

//INSERT INTO DATABASE MESSAGES
$stmt = $mysqli->prepare("insert into messages (message, sender_id, reciever_id) values (?, ?, ?)");
    if (!$stmt) {
        printf("Query Prep Failed: %s\n", $mysqli->error);
        exit;
    }
    $stmt->bind_param('sii', $message, $sender_id, $reciever_id);
    $stmt->execute();
    $stmt->close();
    //return to main page
    Header("Location: home.php");

?>