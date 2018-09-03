<?php
session_start();
include_once '../config/Database.php';
include_once '../models/CreditModel.php';
include_once '../models/CreditCardModel.php';
include_once '../models/AdminConstant.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

$credit_card = new CreditCardModel($db);
$credit = new CreditModel($db);
$admin_constant = new AdminConstant($db);

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

if(isset($_POST['admin_constants'])) {
    $admin_constant->guest_credit_fee = $_POST['guest_credit_fee'];
    $admin_constant->transfer_cost = $_POST['transfer_cost'];
    $admin_constant->default_savings_interest = $_POST['default_savings_interest'];
    print_r($_POST);
    if($admin_constant->updateConstants()) {
        $_SESSION['guest_credit_fee'] = $_POST['guest_credit_fee'];
        $_SESSION['transfer_cost'] = $_POST['transfer_cost'];
        $_SESSION['default_savings_interest'] = $_POST['default_savings_interest'];
    }
    unset($_POST['guest_credit_fee']);
    $_SESSION['response'] = 'Cambio efectuado';
    header('Location: ../views/admin.php ');
}
