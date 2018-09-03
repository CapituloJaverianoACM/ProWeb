<?php
session_start();
include_once '../config/Database.php';
include_once '../models/MessageModel.php';


// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

$message = new MessageModel($db);


$message->user_id = $_SESSION['user_id'];
$_SESSION['all_user_messages'] = $message->getMessageByUserId();


