
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/master.css">

    <title>Solicitar Credito</title>
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
          <?php session_start(); if($_SESSION['isAdmin']) echo '<a class="p-2 text-dark" href="./admin.php">Admin</a>';?>
      </nav>
      <a class="btn btn-outline-danger" href="../controllers/logoutController.php">Logout</a>
    </div>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4">Solicita tu Crédito</h1>
      <p class="lead">Quickly build an effective pricing table for your potential customers with this Bootstrap example. It's built with default Bootstrap components and utilities with little customization.</p>
    </div>
    <div class="container ">
        <div class="card card-login mx-auto mt-5 ">
        <div class="card-header bg-primary text-center"><h4>Formulario de Solicitud</h4></div>
                <div class="card-body ">
                    <form action="../controllers/createNewCreditController.php" method="post">
                        <div class="col-sm-10 offset-sm-5 text-center">
                            <div class="form-group row ">
                                <div class="col-xs-4">
                                    <label for="InputUser">Monto a Prestar</label>
                                    <input required class="form-control" id="InputUser" name="loan_amount" type="number"  placeholder="Ingrese monto a prestar" text-center>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-10 offset-sm-5 text-center">
                            <div class="form-group row">
                                <div class="col-xs-4">
                                    <label for="inputDate">Tasa de Interés</label>
                                    <input required class="form-control"  max="1.0" step=".01" name="interest_rate" type="number" placeholder="Tasa propuesta">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-10 offset-sm-5 text-center">
                            <div class="form-group row">
                                <div class="col-xs-4">
                                    <label for="inputDate">Fecha de pago</label>
                                    <input required class="form-control"  name="pay_date" placeholder="AAAA-MM-DD" id="date" type="date" >
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10 offset-sm-5 text-center">
                            <div class="form-group row">
                                    <div class="col-xs-4">
                                      <button type="submit" class="btn btn-primary">Realizar solicitud</button>
                                    </div>
                            </div>
                        </div>
                    </form>

            </div>
        </div>
    </div>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
</body>
</html>
