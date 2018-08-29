<?php
  include_once 'includes/dbh.inc.php';
  if(array_key_exists('response',$_GET)) {
    if($_GET['response'] == 1) {
      echo '<script type="text/javascript">alert("Wrong Username or Password");</script>';
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <h1>Log In</h1>
      <form action="includes/login.inc.php" method="post">

        <div class="form-group">
          <label for="inputNombre">Username</label>
          <input type="text" required="required" name="usuario" class="form-control" placeholder="Enter Username">
        </div>
        <div class="form-group">
          <label for="inputPassword">Password</label>
          <input type="password" required="required" name="passwd" class="form-control" placeholder="Enter Password">
        </div>
        <button type="submit" class="btn btn-success">Login</button>
        <a href="UserRegister.php" class="btn btn-warning">Register</a>
      </form>
    </div>
  </body>
</html>
