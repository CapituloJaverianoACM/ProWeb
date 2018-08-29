<?php
  include_once 'includes/dbh.inc.php';
  $sql = "SELECT * FROM usuario WHERE isAdmin = 0";
  $result = mysqli_query($conn, $sql);
  $resultCheck = mysqli_num_rows($result);
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
          <th>ID</th>
          <th>Cedula</th>
          <th>Username</th>
        </thead>
        <tbody>
        <?php
        if($resultCheck > 0) {
          while ($row = mysqli_fetch_array($result)) {
            $href = "profile.php?cedula=".$row['cedula'];
            $hrefEditUser = "editUser.php?username=".$row['username'];
            echo "<tr>";
            echo "<td>".$row['id']."</td>";
            echo "<td><a href='$href'>".$row['cedula']."</a></td>";
            echo "<td><a href='$hrefEditUser'>".$row['username']."</a></td>";
            echo "</tr>";
          }
        }
        ?>
        </tbody>
      </table>
      <a class="btn btn-warning" href="login.php">Logout</a>
    </div>
  </body>
</html>
