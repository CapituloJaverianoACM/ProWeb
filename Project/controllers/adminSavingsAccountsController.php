<?php
session_start();
include_once '../config/Database.php';
include_once '../models/SavingsAccountModel.php';


// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

$accout = new SavingsAccountModel($db);

$accout->id = $_POST['account_id'];

$accout->deleteSavingAccoutById();




header('Location: ../views/adminSavingsAccounts.php');