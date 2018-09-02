<?php
  include_once '../controllers/adminController.php';
  $credits = $_SESSION['all_credits'];
  $credit_cards = $_SESSION['all_credit_cards'];
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Create Savings Account</title>
  </head>
  <body>

    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
      <h5 class="my-0 mr-md-auto font-weight-normal">J&A Bank</h5>
      <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="#">Features</a>
        <a class="p-2 text-dark" href="#">Enterprise</a>
        <a class="p-2 text-dark" href="#">Support</a>
        <a class="p-2 text-dark" href="#">Pricing</a>
      </nav>
      <a class="btn btn-outline-danger" href="../controllers/logoutController.php">Logout</a>
    </div>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4">Administración de Creditos y Tarjetas de Credito</h1>
      <p class="lead">Aquí podras aprobar o editar las solicitudes hechas por los clientes.</p>
    </div>

    <div class="container">
      <form class="form" action="../controllers/adminController.php" method="post">
        <div class="row">
          <div class="col-6">
            <label for="cc">ID Credito</label>
            <select placeholder="ID Credito" name="credit_id" class="form-control" id="sel1" required>
              <?php
                foreach ($credits as $key => $value) {
                  $id = $value['id'];
                  echo '<option>'. $id .'</option>';
                }
              ?>
            </select>
          </div>
          <div class="col-6">
            <button type="submit" class="submit-btn btn btn-warning">Ver Solicitud</button>
          </div>

        </div>
      </form>
      <form class="form" action="../controllers/adminController.php" method="post">
        <div class="row">
          <div class="form-group col-6">
            <label for="cc">ID Tarjeta Credito</label>
            <select placeholder="ID Tarjeta" name="credit_id" class="form-control" id="cc" required>
              <?php
                foreach ($credit_cards as $key => $value) {
                  $id = $value['id'];
                  echo '<option>'. $id .'</option>';
                }
              ?>
            </select>
          </div>
          <div class="form-group col-6">
            <button type="submit" class="submit-btn btn btn-warning">Ver Solicitud</button>
          </div>

        </div>
      </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
