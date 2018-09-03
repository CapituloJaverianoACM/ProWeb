<?php
session_start();
include_once '../config/Database.php';
include_once '../models/CreditModel.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

$credit = new CreditModel($db);

$credit->id = $_POST['id'];
$credit->getCreditById();
$credit->interest_rate = $_POST['interest_rate'];
$credit->pay_date = $_POST['pay_date'];
$credit->loan_amount = $_POST['loan_amount'];
$credit->isAproved = $_POST['isAproved'];
$credit->late_payment_fee = $_POST['late_payment_fee'];
if(isset($_POST['guest_email'])) {
    $credit->guest_email = $_POST['guest_email'];
} else {
$credit->user_id = $_POST['user_id'];
}
$credit->balance = 0;
if($credit->updateCredit()) {
    $_SESSION['response'] = "Credito editado correctamente";
} else {
    $_SESSION['response'] = "Error al editar el credito";
}

header('Location: ../views/admin.php');
