<?php
  session_start();
  include_once '../config/Database.php';
  include_once '../models/SavingsAccountModel.php';
  include_once '../models/CreditModel.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  $account = new SavingsAccountModel($db);
  $credit = new CreditModel($db);

  $account->user_id = $_SESSION['user_id'];
  $_SESSION['all_savings_accounts'] = $account->getAllAccounts();
  $_SESSION['savings_accounts'] = $account->getAllClientsAccounts();

  $credit->user_id = $_SESSION['user_id'];
  $_SESSION['client_credits'] = $credit->getClientsAprovedCredits();
