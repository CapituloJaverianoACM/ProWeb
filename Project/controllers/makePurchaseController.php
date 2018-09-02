<?php
  session_start();
  include_once '../config/Database.php';
  include_once '../models/CreditCardPurchaseModel.php';
  include_once '../models/CreditCardModel.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  $purchase = new CreditCardPurchaseModel($db);
  $credit_card = new CreditCardModel($db);

  print_r($_POST);

  $credit_card->id = $_POST['credit_card_id'];
  $credit_card->getCreditCardById();
  $amountInJaveCoins = $_POST['isJavecoins'] ? $_POST['amount'] : $_POST['amount']/1000;
  if($credit_card->consumed + $amountInJaveCoins <= $credit_card->max_capacity + $credit_card->overbook) {
    $credit_card->consumed += $amountInJaveCoins;
    $credit_card->updateCreditCard();
    $purchase->number_fees = $_POST['number_fees'];
    $purchase->amount = $_POST['amount'];
    $purchase->isJavecoins = $_POST['isJavecoins'];
    $purchase->credit_card_id = $_POST['credit_card_id'];
    $purchase->createCreditCardPurchase();
    $_SESSION['response'] = "Compro hecha exitosamente";
  } else {
    $_SESSION['response'] = "Cupo Maximo Exedido";
  }


  header('Location: ../views/creditCard.php');
