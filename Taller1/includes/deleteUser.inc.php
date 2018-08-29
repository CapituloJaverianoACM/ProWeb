<?php
  include_once 'dbh.inc.php';
  $cedula = mysqli_real_escape_string($conn, $_POST['cedula']);
  $sql = "DELETE FROM Personas WHERE Cedula = '$cedula'";
  mysqli_query($conn, $sql);
  header("Location: ../PersonasAdmin.php?action=3");
