<?php
include_once '../controllers/savingsAccountController.php';
$username = (isset($_SESSION['username']) ? $_SESSION['username'] : 'Error');
$accounts = $_SESSION['savings_accounts'];
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
          integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/profile.css">

    <title>Solicitar</title>
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
        <?php if ($_SESSION['isAdmin']) echo '<a class="p-2 text-dark" href="./admin.php">Admin</a>'; ?>
    </nav>
    <a class="btn btn-outline-danger" href="../controllers/logoutController.php">Logout</a>
</div>

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Solicitar Tarjeta de Credito</h1>
    <p class="lead">¡Bienvenido <?php echo $username; ?>! Para solicitar tu tarjeta de credito solo debes ingresar
        la capacidad maxima de tu tarjeta y la cuenta a la que la vas a asociar.</p>
</div>

<div class="container">
    <div class="row text-center">
        <div class="col-lg-12">
            <i class="fas fa-9x fa-credit-card ico-color-tc"></i>

            <div class="col-sm-10 offset-sm-4 text-center">
                <div class="form-group row">
                    <div class="col-xs-4">
                        <form class="form-signin" method="post" action="../controllers/createCreditCardController.php">
                            <label for="exampleFormControlInput1">Ingresa el cupo que desea para su tarjeta de
                                credito.</label>
                            <input type="number" class="form-control" name="max_capacity" placeholder="Cupo" required>
                            <br>


                            <div class="row">
                                <label for="exampleFormControlInput1">ID de la Cuenta asociada.</label>
                                <div class="col-12">
                                    <select placeholder="Cuenta de Ahorros" name="account_id" class="form-control"
                                            id="sel1" required>
                                        <?php
                                        foreach ($accounts as $key => $value) {
                                            $id = $value['id'];
                                            echo '<option>' . $id . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>

                            </div>

                            <br>

                            <button class="btn btn-lg btn-primary btn-block" type="submit">Solicitar Tarjeta</button>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>

</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>
</html>
