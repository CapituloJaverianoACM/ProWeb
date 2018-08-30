<?php
  session_start();
  include_once '../config/Database.php';
  include_once '../models/SavingsAccountModel.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  $account = new SavingsAccountModel($db);


  $account->user_id = $_SESSION['user_id'];

  $_SESSION['savings_accounts'] = array();
  array_push($_SESSION['savings_accounts'], $account->getAllClientsAccounts());

  header('Location: ../views/savingsAccount.php');
