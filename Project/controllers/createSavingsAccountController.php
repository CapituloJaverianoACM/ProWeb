<?php
  session_start();
  include_once '../config/Database.php';
  include_once '../models/SavingsAccountModel.php';

  $database = new Database();
  $db = $database->connect();

  $account = new SavingsAccountModel($db);

  $account->user_id = $_SESSION['user_id'];
  $account->balance = (isset($_POST['balance']) ? $_POST['balance'] : 0);
  $account->interest_rate = $_SESSION['default_savings_interest'];
  if($account->createSavingsAccount()) {
    header('Location: ../views/savingsAccount.php');
  } else {
    echo "Error creado la cuenta";
  }
