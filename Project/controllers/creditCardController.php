<?php
  session_start();
  include_once '../config/Database.php';
  include_once '../models/CreditCardModel.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  $credit_card = new CreditCardModel($db);
  $credit_card->user_id = $_SESSION['user_id'];
  $_SESSION['approved_credit_cards'] = $credit_card->getAprovedCreditCards();
  $_SESSION['all_credit_cards'] = $credit_card->getClientCreditCards();
