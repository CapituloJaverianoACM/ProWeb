<?php
  include_once 'dbh.inc.php';
  $cedula = mysqli_real_escape_string($conn, $_POST['cedula']);
  $usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
  $passwd = mysqli_real_escape_string($conn, $_POST['passwd']);
  $isAdmin = mysqli_real_escape_string($conn, $_POST['isAdmin']);
  $hash = password_hash($passwd, PASSWORD_DEFAULT);
  $isAdmin = $isAdmin == "TRUE" ? 1 : 0;
  print_r($_POST);
  $sql = "INSERT INTO `usuario` (`cedula`, `isAdmin`, `username`, `password`)
          VALUES ('$cedula', '$isAdmin', '$usuario', '$hash')";

  $findPerson = "SELECT * FROM Personas WHERE cedula = '$cedula'";
  $findUser = "SELECT * FROM usuario WHERE username = '$usuario'";
  $isPersonExisting = mysqli_num_rows(mysqli_query($conn, $findPerson)) > 0 ? 1 : 0;
  $isUserExisting = mysqli_num_rows(mysqli_query($conn, $findUser)) > 0 ? 1 : 0;

  print_r($isUserExisting);
  print_r($isPersonExisting);
  print_r($sql);

  if(!$isPersonExisting) {
    header("Location: ../UserRegister.php?response=2");
  }
  elseif($isUserExisting) {
    header("Location: ../UserRegister.php?response=3");
  }else {
    echo "In ELSE Existing";
    mysqli_query($conn, $sql);
    header("Location: ../UserRegister.php?response=1");
  }
