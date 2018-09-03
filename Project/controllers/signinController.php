<?php
  session_start();
  include_once '../config/Database.php';
  include_once '../models/ClientModel.php';
  include_once '../models/AdminConstant.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  $client = new ClientModel($db);
  $admin_constant = new AdminConstant($db);

  $client->username = $_POST['username'];
  $client->password = $_POST['password'];

  if($client->checkUserLogin()) {
    if(!isset($_SESSION['username'])) {
      $_SESSION['username'] = $client->username;
      $_SESSION['user_id'] = $client->id;
      $_SESSION['guest_credit_fee'] = $admin_constant->getGuestCreditFee();
      $_SESSION['isAdmin'] = $client->isAdmin;
    }
    header('Location: ../views/profile.php');
  } else {
    echo 'Access Denied';
  }
