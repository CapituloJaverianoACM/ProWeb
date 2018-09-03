<?php
    session_start();
    $credit_card = $_SESSION['credit_card_aprove'];
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

    <link rel="stylesheet" href="./css/makePurchase.css">
    <title>Solicitud CC</title>
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
    <h1 class="display-4">Revisar Solicitud de Tarjeta de Credito</h1>
    <p class="lead">Revisa los campos para aprobar la siguente tarjeta de credito.</p>
</div>

<div class="container">
    <form action="../controllers/creditCardApplicarionController.php" method="post">
        <div class="form-group">
            <label for="max_capacity">ID de Tarjeta</label>
            <input readonly type="number" class="form-control" name="id" value="<?php echo $credit_card['id']; ?>" required>
        </div>
        <div class="form-group">
            <label for="max_capacity">Cupo Máximo</label>
            <input type="number" class="form-control" name="max_capacity" value="<?php echo number_format($credit_card['max_capacity'],2, '.', ''); ?>" required>
        </div>
        <div class="form-group">
            <label for="max_capacity">Sobrecupo</label>
            <input type="number" class="form-control" name="overbook" value="<?php echo number_format($credit_card['overbook'],2, '.', ''); ?>" required>
        </div>
        <div class="form-group">
            <label for="max_capacity">Cuota de Manejo</label>
            <input type="number" class="form-control" name="handling_fee" value="<?php echo number_format($credit_card['handling_fee'],2, '.', ''); ?>" required>
        </div>
        <div class="form-group">
            <label for="max_capacity">Tasa Interes</label>
            <input type="number" class="form-control" step="0.01" name="interest_rate" value="<?php echo number_format($credit_card['interest_rate'],2, '.', ''); ?>" required>
        </div>
        <div class="form-group">
            <label for="max_capacity">ID del Dueño</label>
            <input readonly type="number" class="form-control" name="user_id" value="<?php echo number_format($credit_card['user_id'],2, '.', ''); ?>" required>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-check text-center">
                    <input class="form-check-input" type="radio" name="isAproved" id="exampleRadios1" value="0">
                    <label class="form-check-label" for="exampleRadios1">
                        No Aprovado
                    </label>
                </div>
            </div>
            <div class="col-6">
                <div class="form-check text-center">
                    <input class="form-check-input" type="radio" name="isAproved" id="exampleRadios2" value="1" checked>
                    <label class="form-check-label" for="exampleRadios2">
                        Aprovado
                    </label>
                </div>
            </div>
        </div>
        <button type="submit" class="submit-btn btn btn-success">Confirmar</button>
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