<?php
  include_once 'dbh.inc.php';
  print_r($_POST);
  $username = $_POST['usuario'];
  $passwd = $_POST['passwd'];


  $sql = "SELECT * FROM usuario WHERE username = '$username'";
  $result = mysqli_query($conn, $sql);
  $user_obj = mysqli_fetch_array($result);

  if(password_verify($passwd, $user_obj['password'])) {
    if($user_obj['isAdmin'] == 1) {
      header("Location: ../adminUsers.php");
    } else {
      header("Location: ../profile.php?cedula=".$user_obj['cedula']);
    }
  } else {
    header("Location: ../login.php?response=1");
  }
