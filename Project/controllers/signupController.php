<?php
  include_once '../config/Database.php';
  include_once '../models/ClientModel.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  $client = new ClientModel($db);

  $client->username = $_POST['username'];
  $client->password = $_POST['password'];

  // TODO: Redirect page.
  if($client->createClient()) {
      header('Location: ../views/signin.php');
  } else {
      echo 'Error al crear el cliente';
  }
