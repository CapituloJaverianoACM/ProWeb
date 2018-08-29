<?php
  include_once 'includes/dbh.inc.php';
  $sql = "SELECT * FROM usuario";
  $countRows = mysqli_num_rows(mysqli_query($conn, $sql));
  $isAdmin = $countRows > 0 ? 0 : 1;
  if(array_key_exists('response',$_GET)) {
    if($_GET['response'] == 1) {
      echo '<script type="text/javascript">alert("Usuario Creado");</script>';
    } elseif ($_GET['response'] == 2) {
      echo '<script type="text/javascript">alert("Cedula no existe");</script>';
    } elseif ($_GET['response'] == 3) {
      echo '<script type="text/javascript">alert("El Usuario ya Existe");</script>';
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <h1>User Registration</h1>
      <form action="includes/registerUser.inc.php" method="post">
        <div class="form-group">
          <label for="inputCedula">Cedula</label>
          <input type="number" required="required" name="cedula" class="form-control" placeholder="Enter Cedula">
        </div>
        <div class="form-group">
          <label for="inputNombre">User</label>
          <input type="text" required="required" name="usuario" class="form-control" placeholder="Enter Name">
        </div>
        <div class="form-group">
          <label for="inputApellido">Password</label>
          <input type="password" required="required" name="passwd" class="form-control" placeholder="Enter Password">
        </div>
        <div class="form-group">
          <label for="inputApellido">Is Admin</label>
          <input id="isAdmin" type="text" name="isAdmin" value="<?php if($isAdmin) {echo 'TRUE';} else {echo 'FALSE';} ?>"   readonly>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="login.php" class="btn btn-success">Login</a>
      </form>
    </div>
  </body>
</html>
