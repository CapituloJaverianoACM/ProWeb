<?php
include_once '../config/Database.php';
include_once '../models/ClientModel.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

$client = new ClientModel($db);

$client->id = $_POST['id'];

if(isset($_POST['save'])) {
    $client->getClientById();
    $client->username = $_POST['username'];
    $client->password = $_POST['password'];
    $client->isAdmin = $_POST['isAdmin'];
    $client->updateClient();
}

if(isset($_POST['delete'])) {
    $client->deleteUserById();
}
header('Location: ../views/administrateClients.php');


