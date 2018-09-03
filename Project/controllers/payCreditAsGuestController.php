<?php
session_start();
include_once '../config/Database.php';
include_once '../models/CreditModel.php';
include_once '../models/MovementModel.php';
include_once '../models/TypeTransferEnum.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

$credit = new CreditModel($db);
$credit->guest_email = $_SESSION['guest_email'];

$error = true;

$movement = new MovementModel($db);

$movement->type_transfer = TypeTransferEnum::ConsignCredit;

$_SESSION['aproved_credits'] = $credit->getGuestAprovedCredits();

if(isset($_POST['pay'])) {
    $movement->amount = $_POST['amount'];
    $credit->id = $_POST['destiny_credit_id'];
    $credit->getCreditById();
    $movement->destiny = $credit->id;
    if($credit->balance - $movement->amount >= 0) {
        $credit->balance -= $movement->amount;
        $credit->updateCredit();
        $_SESSION['response'] = 'Pago efectuado exitosamente';
        $error = false;
    } else {
        $_SESSION['response'] = 'Saldo insuficiente o Sobrepagando Credito';
    }
    if( !$error )
        $movement->createMovement();
    header('Location: ../views/newCreditVisitor.php');
}