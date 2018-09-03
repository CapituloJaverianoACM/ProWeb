<?php
  session_start();
  include_once '../config/Database.php';
  include_once '../models/CreditModel.php';

  $database = new Database();
  $db = $database->connect();

  $credit = new CreditModel($db);

  if(isset($_SESSION['user_id'])) {
      $credit->user_id = $_SESSION['user_id'];

      $_SESSION['credits'] = $credit->getAllClientsCredits();
  }

if(isset($_SESSION['guest_email'])) {
    $credit->guest_email = $_SESSION['guest_email'];

    $_SESSION['credits'] = $credit->getAllGuestCredits();
}

