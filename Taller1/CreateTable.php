<?php
  include_once 'includes/dbh.inc.php'
?>

<html>
  <head>
    <meta charset="utf-8">
    <title>Create Table</title>
  </head>


  <body>
    <h1>Create Table View</h1>
    <form action="CreateTableSuccess.php" method="post">
      <p><label for="tableTittle">Table Tittle</label>
      <input type="text" name="tableTittle"></p>
      <input type="submit">
    </form>
    <h2>Post Content</h2>

  </body>
</html>
