<?php
session_start();
include_once '../config/Database.php';
include_once '../models/CreditCardModel.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

$credit_card = new CreditCardModel($db);

$credit_card->id = $_POST['id'];
$credit_card->getCreditCardById();
$credit_card->max_capacity = $_POST['max_capacity'];
$credit_card->overbook = $_POST['overbook'];
$credit_card->handling_fee = $_POST['handling_fee'];
$credit_card->interest_rate = $_POST['interest_rate'];
$credit_card->isAproved = $_POST['isAproved'];
if($credit_card->updateCreditCard()) {
    $_SESSION['response'] = "Tarjeta de credito editado correctamente";
} else {
    $_SESSION['response'] = "Error al editar la tarjeta de credito";
}

header('Location: ../views/admin.php');
