<?php
  $directoryName = $_POST['cedula'];
  echo "$directoryName";
  if (!file_exists($directoryName)) {
    mkdir($directoryName."/",0777,true);
  }
  move_uploaded_file($_FILES["arch"]["tmp_name"], $directoryName."/".$_FILES["arch"]["name"]);
  header("Location: ./sendEmail.inc.php");
