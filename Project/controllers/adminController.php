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

  $_SESSION['all_credits'] = $credit->getAllCredits();
  $_SESSION['all_credit_cards'] = $credit_card->getAllCreditCards();
