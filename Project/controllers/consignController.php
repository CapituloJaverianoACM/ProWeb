<?php
  session_start();
  include_once '../config/Database.php';
  include_once '../models/CreditModel.php';
  include_once '../models/SavingsAccountModel.php';
  include_once '../models/MovementModel.php';
  include_once '../models/TypeTransferEnum.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  $credit = new CreditModel($db);
  $account_origin = new SavingsAccountModel($db);
  $account_destiny = new SavingsAccountModel($db);
  $movement = new MovementModel($db);

  $account_origin->id = isset($_POST['origin_account_id']) ? $_POST['origin_account_id'] : $_POST['account_to_consign'] ;
  $account_origin->getSavingAccountById();

  $movement->amount = $_POST['amount'];
  $movement->savings_account_id = $account_origin->id;
  $movement->type_transfer = (isset($_POST['destiny_account_id'])) ? TypeTransferEnum::ConsignSavingsAccount : TypeTransferEnum::ConsignCredit;
  $movement->type_transfer = (isset($_POST['account_to_consign'])) ? TypeTransferEnum::CashConsign : $movement->type_transfer;

  $error = true;

 if($_POST['amount'] < 0) {
     $_SESSION['response'] = 'Monto no puede ser negativo';
     $_POST = array();
     header('Location: ../views/savingsAccount.php');
 }

  if(isset($_POST['destiny_account_id'])) {
    $account_destiny->id = $_POST['destiny_account_id'];
    $account_destiny->getSavingAccountById();
    $movement->destiny = $account_destiny->id;
    if($account_origin->balance - $movement->amount >= 0) {
      $account_origin->balance -= $movement->amount;
      $account_destiny->balance += $movement->amount;
      $account_origin->updateAccount();
      $account_destiny->updateAccount();
      $_SESSION['response'] = 'Retiro efectuado exitosamente';
      $error = false;
    } else {
      $_SESSION['response'] = 'Saldo insuficiente';
    }
  }

  if(isset($_POST['destiny_credit_id'])) {
    $credit->id = $_POST['destiny_credit_id'];
    $credit->getCreditById();
    $movement->destiny = $credit->id;
    if($account_origin->balance - $movement->amount >= 0 && $credit->balance - $movement->amount >= 0) {
      $account_origin->balance -= $movement->amount;
      $credit->balance -= $movement->amount;
      $account_origin->updateAccount();
      $credit->updateCredit();
      $_SESSION['response'] = 'Retiro efectuado exitosamente';
      $error = false;
    } else {
      $_SESSION['response'] = 'Saldo insuficiente o Sobrepagando Credito';
    }
  }

  if(isset($_POST['account_to_consign'])) {
    $account_origin->id = $_POST['account_to_consign'];
    $account_origin->getSavingAccountById();
    $account_origin->balance += $movement->amount;
    $account_origin->updateAccount();
    $_SESSION['response'] = 'Consignacion efectuado exitosamente';
    $error = false;
  }

  if( !$error )
    $movement->createMovement();

  header('Location: ../views/savingsAccount.php');
