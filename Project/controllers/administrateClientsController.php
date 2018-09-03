<?php
session_start();
include_once '../config/Database.php';
include_once '../models/ClientModel.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

$client = new ClientModel($db);

$_SESSION['all_clients'] = $client->getAllClients();

if(isset($_POST['username'])){
    $client->username = $_POST['username'];
    $_SESSION['user_to_edit'] = $client->getClientByUsername();
    header('Location: ../views/editClient.php');
}