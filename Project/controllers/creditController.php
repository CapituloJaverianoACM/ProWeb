<?php
  session_start();
  include_once '../config/Database.php';
  include_once '../models/CreditModel.php';

  $database = new Database();
  $db = $database->connect();

  $credit = new CreditModel($db);

  $credit->user_id = $_SESSION['user_id'];

  $_SESSION['credits'] = $credit->getAllClientsCredits();
