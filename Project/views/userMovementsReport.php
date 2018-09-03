<?php
include_once '../controllers/movementController.php';
$movements = $_SESSION['all_user_movements']

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
        <a class="p-2 text-dark" href="#">Features</a>
        <a class="p-2 text-dark" href="#">Enterprise</a>
        <a class="p-2 text-dark" href="#">Support</a>
        <a class="p-2 text-dark" href="#">Pricing</a>
        <?php if($_SESSION['isAdmin']) echo '<a class="p-2 text-dark" href="./admin.php">Admin</a>';?>
    </nav>
    <a class="btn btn-outline-danger" href="../controllers/logoutController.php">Logout</a>
</div>
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Tus Movimientos</h1>
    <div class="container">


        <table class="table">
            <thead>
            <tr>
                <th scope="col">Monto</th>
                <th scope="col">Tipo</th>
                <th scope="col">Banco</th>
                <th scope="col">Costo de Movimiento</th>
                <th scope="col">Fecha</th>
                <th scope="col">Origen</th>
                <th scope="col">Destino</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($movements as $key => $value) {
                echo '<tr>';
                echo '<th scope="row"> $'.number_format($movements[$key]['amount'],2)."</th>";
                echo "<td>" . (($movements[$key]['type_transfer']==1) ? 'Consignacion a cuenta' : 'Consignacion a credito') . " </td>";
                echo "<td>" . $movements[$key]['origin_bank'] . "</td>";
                echo "<td> $ " .number_format($movements[$key]['transfer_cost'],2) . "</td>";
                echo "<td>" . $movements[$key]['date'] . "</td>";
                echo "<td>" . $movements[$key]['savings_account_id'] . "</td>";
                echo "<td>" . $movements[$key]['destiny'] . "</td>";
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

<div class="container">

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
