<?php
  session_start();
  include_once '../config/Database.php';
  include_once '../models/ClientModel.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  $client = new ClientModel($db);

  $client->username = $_POST['username'];
  $client->password = $_POST['password'];

  if($client->checkUserLogin()) {
    if(!isset($_SESSION['username'])) {
      $_SESSION['username'] = $client->username;
      $_SESSION['user_id'] = $client->id;
      $_SESSION['rate_credit_guest'] = 0.03;
    }
    header('Location: ../views/profile.php');
  } else {
    echo 'Access Denied';
  }
