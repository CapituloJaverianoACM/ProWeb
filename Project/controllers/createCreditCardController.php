<?php
  session_start();
  include_once '../config/Database.php';
  include_once '../models/CreditCardModel.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  $credit_card = new CreditCardModel($db);

  $credit_card->user_id = $_SESSION['user_id'];
  $credit_card->max_capacity = $_POST['max_capacity'];
  $credit_card->savings_account_id = $_POST['account_id'];
  $credit_card->overbook = 0;
  $credit_card->handling_fee = 0;
  $credit_card->interest_rate = 0;
  $credit_card->consumed = 0;
  if($credit_card->createCreditCard()){
    $_SESSION['response'] = "Solicitud Exitosa";
  } else {
    $_SESSION['response'] = "La solicitud no se pudo procesar";
  }
  header('Location: ../views/creditCard.php');
