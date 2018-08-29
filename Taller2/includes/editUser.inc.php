<?php
  include_once 'dbh.inc.php';
  $cedula = mysqli_real_escape_string($conn, $_POST['cedula']);
  $usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
  $passwd = mysqli_real_escape_string($conn, $_POST['passwd']);
  $isAdmin = mysqli_real_escape_string($conn, $_POST['isAdmin']);
  $hash = password_hash($passwd, PASSWORD_DEFAULT);
  print_r($_POST);
  $sql = "UPDATE usuario
          SET cedula = '$cedula',
          isAdmin = '$isAdmin',
          password = '$hash'
          WHERE username = '$usuario'
          ";


  mysqli_query($conn, $sql);
  print_r($_POST);
  //header("Location: ../adminUsers.php?response=".$cedula);
