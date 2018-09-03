<?php
include_once '../controllers/payCreditAsGuestController.php';
if(isset($_SESSION['response'])) {
    $jsScript .= '<script> alert("' .$_SESSION['response']. '")</script>';
    echo $jsScript;
    unset($_SESSION['response']);
}
$credits = $_SESSION['aproved_credits'];
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/profile.css">

    <title>Profile</title>
</head>
<body>
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">J&A Bank</h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="./profileVisitor.php">Perfil</a>
        <a class="p-2 text-dark" href="./signup.php">Cuenta de Ahorros</a>
        <a class="p-2 text-dark" href="./newCreditVisitor.php">Creditos</a>
        <a class="p-2 text-dark" href="./signup.php">Tarjetas de Creditos</a>
    </nav>
    <a class="btn btn-outline-danger" href="../controllers/logoutController.php">Log Out</a>
</div>

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Paga tu Credito como Visitabte</h1>
    <p class="lead">Llena el formulario para pagar tu credito</p>
</div>

<div class="container">
    <form class="form" action="../controllers/payCreditAsGuestController.php" method="post">
        <div class="row form-group">
            <div class="col-4">
                <input type="number" name="amount" class="form-control" id="inputPassword2" placeholder="Monoto a Pagar" required>
            </div>
            <div class="col-4">
                <select placeholder="ID Credito" name="destiny_credit_id" class="form-control" id="sel1" required>
                    <?php
                    foreach ($credits as $key => $value) {
                        $id = $value['id'];
                        $balance = $value['balance'];
                        echo '<option>'. $id .'</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="col-4">
                <button type="submit" name="pay" class="submit-btn btn btn-warning">Pagar</button>
            </div>

        </div>
    </form>
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

