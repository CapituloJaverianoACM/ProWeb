<?php
session_start();
include_once '../config/Database.php';
include_once '../models/CreditModel.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

$credit = new CreditModel($db);
$credit->guest_email = $_SESSION['guest_email'];
$credit->interest_rate = $_SESSION['guest_credit_fee'];
$credit->pay_date = $_POST['pay_date'];
$credit->loan_amount = $_POST['loan_amount'];
$credit->balance = $_POST['loan_amount'];
$credit->late_payment_fee = 0.03;
$credit->isAproved = 0;
if($credit->createCreditToClient()) {
    $_SESSION['response'] = "Credito solicitado correctamente";
} else {
    $_SESSION['response'] = "Error al creat credito";
}

header('Location: ../views/profileVisitor.php');