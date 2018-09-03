<?php
session_start();
include_once '../config/Database.php';
include_once '../models/MessageModel.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

$message = new MessageModel($db);
$message->user_id = $_POST['user_id'];
$message->content = $_POST['content'];
$message->createMessage();

header('Location: ../views/createMessage.php');







