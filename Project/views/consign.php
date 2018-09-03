<?php
  include_once '../controllers/savingsAccountController.php';
  $accounts = $_SESSION['all_savings_accounts'];
  $client_accounts = $_SESSION['savings_accounts'];
  $credits = $_SESSION['client_credits'];
 ?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/master.css">

    <title>Consignar</title>
  </head>
  <body>

    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
      <h5 class="my-0 mr-md-auto font-weight-normal">J&A Bank</h5>
      <nav class="my-2 my-md-0 mr-md-3">
          <a class="p-2 text-dark" href="./profile.php">Perfil</a>
          <a class="p-2 text-dark" href="./savingsAccount.php">Cuenta de Ahorros</a>
          <a class="p-2 text-dark" href="./credits.php">Creditos</a>
          <a class="p-2 text-dark" href="./creditCard.php">Tarjetas de Creditos</a>
          <a class="p-2 text-dark" href="./messages.php">Mensajes</a>
          <?php if($_SESSION['isAdmin']) echo '<a class="p-2 text-dark" href="./admin.php">Admin</a>';?>
      </nav>
      <a class="btn btn-outline-danger" href="../controllers/logoutController.php">Logout</a>
    </div>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4">Consignar</h1>
      <p>Selecciona la cuenta y el destino para consignar</p>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-4">
          <h2>Consignar a Cuenta de Ahorros</h2>
          <form action="../controllers/consignController.php" method="post">
            <label for="origin">Cuenta de Ahorros Origen</label>
            <select name="origin_account_id" class="form-control" id="origin" required>
              <?php
                foreach ($client_accounts as $key => $value) {
                  $id = $value['id'];
                  echo '<option>'. $id .'</option>';
                }
              ?>
            </select>
            <label for="amount">Monto a Consignar</label>
            <input type="number" name="amount" id="amount" placeholder="Monto" class="form-control" required>
            <label for="origin">Cuenta de Destino</label>
            <select name="destiny_account_id" class="form-control" id="origin" required>
              <?php
                foreach ($accounts as $key => $value) {
                  $id = $value['id'];
                  echo '<option>'. $id .'</option>';
                }
              ?>
            </select>
            <button type="submit" class="submit-btn btn btn-info">Consignar</button>
          </form>
        </div>
        <div class="col-4">
          <h2>Consignar a Credito</h2>
          <form action="../controllers/consignController.php" method="post">
            <label for="origin">Cuenta de Ahorros Origen</label>
            <select name="origin_account_id" class="form-control" id="origin" required>
              <?php
                foreach ($client_accounts as $key => $value) {
                  $id = $value['id'];
                  echo '<option>'. $id .'</option>';
                }
              ?>
            </select>
            <label for="amount">Monto a Consignar</label>
            <input type="number" name="amount" id="amount" placeholder="Monto" class="form-control" required>
            <label for="origin">Crédito de Destino</label>
            <select name="destiny_credit_id" class="form-control" id="origin" required>
              <?php
              foreach ($credits as $key => $value) {
                $id = $value['id'];
                echo '<option>'. $id .'</option>';
              }
              ?>
            </select>
            <button type="submit" class="submit-btn btn btn-info">Consignar</button>
          </form>
        </div>
        <div class="col-4">
          <h2>Consignaciones</h2>
          <form action="../controllers/consignController.php" method="post">
            <label for="origin">Consignar Dinero</label>
            <label for="amount">Monto a Consignar</label>
            <input type="number" name="amount" id="amount" placeholder="Monto" class="form-control" required>
            <label for="origin">Cuenta de Destino</label>
            <select name="account_to_consign" class="form-control" id="origin" required>
              <?php
                foreach ($accounts as $key => $value) {
                  $id = $value['id'];
                  echo '<option>'. $id .'</option>';
                }
              ?>
            </select>
            <button type="submit" class="submit-btn btn btn-info">Consignar</button>
          </form>
        </div>
      </div>

    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
