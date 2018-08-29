<?php
  include_once 'includes/dbh.inc.php'
?>
<html>

<?php // CREATE TABLE Personas(Cedula INT, Nombre CHAR(30), Apellido CHAR(30), Correo CHAR(30) ,Edad INT)
// TODO: let the user input it's proper columns
$sql = array_key_exists('tableTittle', $_POST) ? "CREATE TABLE ".$_POST['tableTittle']."(Nombre CHAR(30),Apellido CHAR(30),Edad INT)" : "";
if(array_key_exists('tableTittle', $_POST) && mysqli_query($conn, $sql)) {
  echo "Table created correctly";
} else {
  echo "Error creating table";
}
?>
</html>
