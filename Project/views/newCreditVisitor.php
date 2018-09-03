<?php
include_once '../controllers/creditController.php';
$credits = $_SESSION['credits'];
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Create Savings Account</title>
</head>
<body>

<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">J&A Bank</h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="./profileVisitor.php">Perfil</a>
        <a class="p-2 text-dark" href="./signup.php">Cuenta de Ahorros</a>
        <a class="p-2 text-dark" href="../views/newCreditVisitor.php">Creditos</a>
        <a class="p-2 text-dark" href="./signup.php">Tarjetas de Creditos</a>
    </nav>
    <a class="btn btn-outline-danger" href="../controllers/logoutController.php">Logout</a>
</div>

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Pricing</h1>
    <p class="lead">Quickly build an effective pricing table for your potential customers with this Bootstrap example.
        It's built with default Bootstrap components and utilities with little customization.</p>
</div>
<div class="container ">
    <div class="card card-login mx-auto mt-5 ">
        <div class="card-header bg-primary text-center"><h4>Solicitud de Crédito</h4></div>
        <div class="card-body ">
            <form action="../controllers/newCreditVisitorController.php" method="post">
                <div class="col-sm-10 offset-sm-5 text-center">
                    <div class="form-group row ">
                        <div class="col-xs-4">
                            <label for="InputUser">Monto a prestar</label>
                            <input class="form-control" name="loan_amount" type="number"
                                   placeholder="Ingrese monto a prestar" text-center>
                        </div>
                    </div>
                </div>
                <div class="col-sm-10 offset-sm-5 text-center">
                    <div class="form-group row">
                        <div class="col-xs-4">
                            <label for="inputDate">Fecha de pago</label>
                            <input class="form-control" name="pay_date" id="date" type="date"
                                   placeholder="AAAA-MM-DD">
                        </div>
                    </div>
                </div>
                <div class="col-md-10 offset-sm-5 text-center">
                    <div class="form-group row">
                        <div class="col-xs-4">
                            <button type="submit" href="../controllers/creditVisitor.php"
                                    class="btn btn-primary">Realizar solicitud
                            </button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <a class="btn btn-lg btn-info" href="./payCreditAsGuest.php">Pagar Credito</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Monto del Crédito</th>
            <th scope="col">Tasa de Interes</th>
            <th scope="col">Balance</th>
            <th scope="col">Estado</th>
        </tr>
        </thead>
        <tbody>
        <?php
        echo "<br>";
        foreach ($credits as $key => $value) {
            echo '<tr>';
            $state = $credits[$key]['isAproved'] ? "Aprovado" : "No Aprovado";
            echo '<th scope="row">'.$credits[$key]['id']."</th>";
            echo "<td> $ ".number_format($credits[$key]['loan_amount'],2)." JC </td>";
            echo "<td>".number_format($credits[$key]['interest_rate'],2)."</td>";
            echo "<td>".number_format($credits[$key]['balance'],2)."</td>";
            echo "<td>".$state."</td>";
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>
</html>