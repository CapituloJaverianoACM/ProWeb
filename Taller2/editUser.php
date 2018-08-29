<?php
  include_once 'includes/dbh.inc.php';
  $username = $_GET['username'];
  $sql = "SELECT * FROM usuario WHERE username = '$username'";
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
      <h1>Edit User</h1>
      <form action="includes/editUser.inc.php" method="post">
        <div class="form-group">
          <label for="inputCedula">Cedula</label>
          <input type="number" required="required" name="cedula" class="form-control" value="<?php  echo $user_obj['cedula']?>">
        </div>
        <div class="form-group">
          <label for="inputNombre">User</label>
          <input type="text" required="required" name="usuario" class="form-control" value="<?php  echo $user_obj['username']?>" readonly>
        </div>
        <div class="form-group">
          <label for="inputApellido">Password</label>
          <input type="password" required="required" name="passwd" class="form-control" value="<?php  echo $user_obj['password']?>">
        </div>
        <div class="form-group">
          <label for="inputApellido">Is Admin</label>
          <input id="isAdmin" type="text" name="isAdmin" value="<?php  echo $user_obj['isAdmin']?>">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="includes/deleteUser.php?cedula=<?php echo $user_obj['cedula'] ?>" class="btn btn-danger">Delete User</a>
      </form>
    </div>
  </body>
</html>
