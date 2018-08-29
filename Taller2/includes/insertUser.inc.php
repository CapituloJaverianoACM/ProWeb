<?php
  include_once 'dbh.inc.php';
  $cedula = mysqli_real_escape_string($conn, $_POST['cedula']);
  $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
  $apellido = mysqli_real_escape_string($conn, $_POST['apellido']);
  $correo = mysqli_real_escape_string($conn, $_POST['correo']);
  $edad = mysqli_real_escape_string($conn, $_POST['edad']);
  // TODO: Check SQL Inyection
  // Check if cedula alrready exist
  $sql = "SELECT * FROM Personas WHERE Cedula = '$cedula'";
  $isRegistered = mysqli_num_rows(mysqli_query($conn, $sql)) ? TRUE : FALSE;

  if($isRegistered) {
    $sql = "UPDATE Personas
            SET Nombre = '$nombre',
                Apellido = '$apellido',
                Correo = '$correo',
                Edad = '$edad'
            WHERE Cedula = '$cedula';";
    mysqli_query($conn, $sql);
    header("Location: ../PersonasAdmin.php?action=1");
  } else {
    $sql = "INSERT INTO Personas (Cedula, Nombre, Apellido, Correo, Edad)
          VALUES ('$cedula', '$nombre', '$apellido', '$correo', '$edad');";
    mysqli_query($conn, $sql);
    header("Location: ../PersonasAdmin.php?action=2");
  }
