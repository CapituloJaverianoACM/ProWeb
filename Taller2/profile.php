<?php
  include_once 'includes/dbh.inc.php';
  $cedula = $_GET['cedula'];
  $sql = "SELECT * FROM Personas WHERE cedula = '$cedula'";
  $result = mysqli_query($conn, $sql);
  $user_obj = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <h1>Profile</h1>
      <table class="table">
        <thead>
          <th>Cedula</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Correo</th>
          <th>Edad</th>
        </thead>
        <tbody>
        <?php
          echo "<tr>";
          echo "<td>".$user_obj['Cedula']."</td>";
          echo "<td>".$user_obj['Nombre']."</td>";
          echo "<td>".$user_obj['Apellido']."</td>";
          echo "<td>".$user_obj['Correo']."</td>";
          echo "<td>".$user_obj['Edad']."</td>";
          echo "</tr>";
        ?>
        <div class="row">

        </div>
        </tbody>
      </table>
      <a class="btn btn-warning" href="login.php">Logout</a>
    </div>
  </body>
</html>
