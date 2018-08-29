<?php
  include_once '../config/Database.php';
  include_once '../models/ClientModel.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  $client = new ClientModel($db);

  $client->username = $_POST['username'];
  $client->password = $_POST['password'];

  //TODO: Add javascript to validate the passwords match in the form.

  if($client->createClient()) echo 'Cliente creado exitosamente';
  else echo 'Error al crear el cliente';
