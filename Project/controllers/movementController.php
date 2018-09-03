<?php
session_start();
include_once '../config/Database.php';
include_once '../models/MovementModel.php';


// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

$movement = new MovementModel($db);


$_SESSION['all_user_movements'] = $movement->getAllClientsMovements($_SESSION['user_id']);


