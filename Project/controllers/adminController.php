<?php
session_start();
include_once '../config/Database.php';
include_once '../models/CreditModel.php';
include_once '../models/CreditCardModel.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

$credit_card = new CreditCardModel($db);
$credit = new CreditModel($db);

$_SESSION['all_credits'] = $credit->getUnAprovedCredits();
$_SESSION['all_credit_cards'] = $credit_card->getUnAprovedCreditCards();

if(isset($_POST['credit_id'])) {
    $credit->id =$_POST['credit_id'];
    $_SESSION['credit_aprove'] = $credit->getCreditById()[0];
    header('Location: ../views/creditApplication.php ');
}

if(isset($_POST['credit_card_id'])) {
    $credit_card->id = $_POST['credit_card_id'];
    $_SESSION['credit_card_aprove'] = $credit_card->getCreditCardById()[0];
    header('Location: ../views/creditCardApplication.php ');
}
