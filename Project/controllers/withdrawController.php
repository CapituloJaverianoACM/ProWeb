<?php
  session_start();
  include_once '../config/Database.php';
  include_once '../models/SavingsAccountModel.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  $account = new SavingsAccountModel($db);

  $amountToWithdraw = $_POST['amount'];
  $account->id = $_POST['account_id'];

  $account->getSavingAccountById();

  if($account->balance - $amountToWithdraw >= 0) {
    $account->balance -= $amountToWithdraw;
    $account->updateAccount();
    $_SESSION['response'] = 'Retiro efectuaxo exitosamente';
  } else {
    $_SESSION['response'] = 'Saldo insuficiente';
  }

  header('Location: ../views/savingsAccount.php');
