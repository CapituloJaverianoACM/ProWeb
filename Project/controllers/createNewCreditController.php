<?php
  session_start();
  include_once '../config/Database.php';
  include_once '../models/CreditModel.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  $credit = new CreditModel($db);
  $credit->user_id = $_SESSION['user_id'];
  $credit->interest_rate = $_POST['interest_rate'];
  $credit->pay_date = $_POST['pay_date'];
  $credit->loan_amount = $_POST['loan_amount'];
  $credit->balance = $_POST['loan_amount'];
  $credit->late_payment_fee = 0;
  $credit->isAproved = 0;
  if($credit->createCreditToClient()) {
    $_SESSION['response'] = "Credito solicitado correctamente";
  } else {
    $_SESSION['response'] = "Error al creat credito";
  }

  header('Location: ../views/credits.php');
