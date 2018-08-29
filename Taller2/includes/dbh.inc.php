<?php

// Create connection
$dbUsername = 'root';
$dbPassword = 'root';
$dbServername = 'localhost';
$dbPort = 8889;
$dbName = "Taller1";
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

// Verify connection
if(mysqli_connect_errno()) {
  echo "Connection error: ".mysqli_connect_errno();
}
