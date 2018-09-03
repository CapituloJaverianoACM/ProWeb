<?php
  include_once '../controllers/savingsAccountController.php';
  $accounts = $_SESSION['savings_accounts'];
  $jsScript = "";
  if(isset($_SESSION['response'])) {
    $jsScript .= '<script> alert("' .$_SESSION['response']. '")</script>';
    echo $jsScript;
    unset($_SESSION['response']);
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/savingsAccount.css">

    <title>Savings Account</title>
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
      <h1 class="display-4">Tus Cuentas de Ahorro</h1>
      <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
        enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
        aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
        in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
        officia deserunt mollit anim id est laborum.</p>
    <div class="container">


      <table class="table">
        <thead>
          <tr>
            <th scope="col">Account ID</th>
            <th scope="col">Balance</th>
            <th scope="col">Tasa de Interes</th>
          </tr>
        </thead>
        <tbody>
          <?php
            foreach ($accounts as $key => $value) {
              echo '<tr>';
                echo '<th scope="row">'.$accounts[$key]['id']."</th>";
                echo "<td> $ ".number_format($accounts[$key]['balance'],2)." JC </td>";
                echo "<td>".number_format($accounts[$key]['interest_rate'],2)."</td>";
              echo '</tr>';
            }
          ?>
        </tbody>
      </table>
        <div class="row">
          <div class="col-6">
            <a class="option-btn btn btn-warning" href="./withdraw.php">Retirar</a>
          </div>
          <div class="col-6">
            <a class="option-btn btn btn-primary" href="./consign.php">Consignar</a>
          </div>
        </div>
        <a class="option-btn btn btn-success" href="./createSavingsAccount.php">Crear Cuenta Ahorros</a>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
