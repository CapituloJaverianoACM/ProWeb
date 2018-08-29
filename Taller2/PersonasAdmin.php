<?php
  include_once 'includes/dbh.inc.php';
  if(array_key_exists('action',$_GET)) {
    if($_GET['action'] == 1) {
      echo '<script type="text/javascript">alert("User Updated");</script>';
    }
    if($_GET['action'] == 2) {
      echo '<script language="javascript">';
      echo 'alert("User Incerted")';
      echo '</script>';
    }
    if($_GET['action'] == 3) {
      echo '<script type="text/javascript">alert("User Deleted");</script>';
    }
  }
  $sql = "SELECT * FROM Personas";
  if(array_key_exists('sort', $_GET)) {
    if($_GET['sort'] == 'nombre' && $_GET['asc'] == 'true') {
      $sql .= " ORDER BY Nombre ASC";
    } elseif ($_GET['sort'] == 'nombre' && $_GET['asc'] == 'false') {
      $sql .= " ORDER BY Nombre DESC";
    } elseif ($_GET['sort'] == 'cedula' && $_GET['asc'] == 'true') {
      $sql .= " ORDER BY Cedula ASC";
    } elseif ($_GET['sort'] == 'cedula' && $_GET['asc'] == 'false') {
      $sql .= " ORDER BY Cedula DESC";
    }
  }
  $result = mysqli_query($conn, $sql);
  $resultCheck = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Personas Administrator</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <h1>Personas Table Administrator</h1>
      <h2>Table Content</h2>
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
        if($resultCheck > 0) {
          while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>".$row['Cedula']."</td>";
            echo "<td>".$row['Nombre']."</td>";
            echo "<td>".$row['Apellido']."</td>";
            echo "<td>".$row['Correo']."</td>";
            echo "<td>".$row['Edad']."</td>";
            echo "</tr>";
          }
        }
        ?>
        <div class="row">

        </div>
        </tbody>
      </table>
      <a href="PersonasAdmin.php?sort=nombre&asc=true" class="btn btn-primary col-sm-3">Nombre Ascendente</a>
      <a href="PersonasAdmin.php?sort=nombre&asc=false" class="btn btn-primary col-sm-3">Nombre Descendente</a>
      <a href="PersonasAdmin.php?sort=cedula&asc=true" class="btn btn-primary col-sm-3">Cedula Ascendente</a>
      <a href="PersonasAdmin.php?sort=cedula&asc=false" class="btn btn-primary col-sm-3">Cedula Descendente</a>
      <h2>Table Insert</h2>
      <form action="includes/insertUser.inc.php" method="post">
        <div class="form-group">
          <label for="inputCedula">Cedula</label>
          <input type="number" name="cedula" class="form-control" placeholder="Enter Cedula">
        </div>
        <div class="form-group">
          <label for="inputNombre">Name</label>
          <input type="text" name="nombre" class="form-control" placeholder="Enter Name">
        </div>
        <div class="form-group">
          <label for="inputApellido">Apellido</label>
          <input type="text" name="apellido" class="form-control" placeholder="Enter Lastname">
        </div>
        <div class="form-group">
          <label for="inputCedula">Correo</label>
          <input type="email" name="correo" class="form-control" placeholder="Enter Email">
        </div>
        <div class="form-goup">
          <label for="inputEdad">Edad</label>
          <input type="number" name="edad" class="form-control" placeholder="Enter Age">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

      <h2>Delete User</h2>
      <form action="includes/deleteUser.inc.php" method="post">
        <div class="form-group">
          <label for="inputCedula">Cedula</label>
          <input type="number" name="cedula" class="form-control" placeholder="Enter Cedula">
        </div>
        <button type="submit" class="btn btn-danger">Delete</button>
      </form>
    </div>
  </body>
</html>
