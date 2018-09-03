<?php
  include_once '../controllers/creditCardController.php';
  $credit_cards = $_SESSION['approved_credit_cards'];
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/makePurchase.css">

    <title>Compra Tarjeta de Credito</title>
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
      <h1 class="display-4">Compra de Tarjeta de Credito</h1>
      <p class="lead">Quickly build an effective pricing table for your potential customers with this Bootstrap example. It's built with default Bootstrap components and utilities with little customization.</p>
    </div>
    <div class="container">
      <form action="../controllers/makePurchaseController.php" method="post">
        <div class="form-group">
          <label for="ccid">ID de Tarjeta de Crédito</label>
          <select name="credit_card_id" class="form-control" id="ccid">
            <?php
              foreach ($credit_cards as $key => $value) {
                echo '<option>' . $value['id'] . '</option>';
              }
            ?>
          </select>
        </div>
        <div class="form-group">
          <label for="amount">Monto a Pagar</label>
          <input name="amount" type="number" class="form-control" id="amount" placeholder="Monto a Pagar" required>
        </div>
        <div class="form-group">
          <label for="number_fees">Cuotas</label>
          <select name="number_fees" class="form-control" id="number_fees">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
          </select>
        </div>
        <div class="row">
          <div class="col-6">
            <div class="form-check text-center">
              <input class="form-check-input" type="radio" name="isJavecoins" id="exampleRadios1" value="0">
              <label class="form-check-label" for="exampleRadios1">
                Pesos
              </label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-check text-center">
              <input class="form-check-input" type="radio" name="isJavecoins" id="exampleRadios2" value="1" checked>
              <label class="form-check-label" for="exampleRadios2">
                JaveCoins
              </label>
          </div>
        </div>
        </div>
        <button type="submit" class="submit-btn btn btn-success">Confirmar</button>
      </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
