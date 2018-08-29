<?php
  include_once 'includes/dbh.inc.php';
  $cedula = $_GET['cedula'];
  $sql = "DELETE * FROM usuario WHERE cedula = '$cedula'";
  $result = mysqli_query($conn, $sql);
  header("Location: ../adminUsers.php");
