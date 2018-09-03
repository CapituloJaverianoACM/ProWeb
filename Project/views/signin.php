<?php
$jsScript = "";
if (isset($_SESSION['response'])) {
    $jsScript .= '<script> alert("' . $_SESSION['response'] . '")</script>';
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="./css/signin.css" rel="stylesheet">

    <title>Sign In</title>
</head>
<body class="text-center">
<form class="form-signin" method="post" action="../controllers/signinController.php">
    <img class="mb-4" src="./assets/logo2.png" alt="" width="130">
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    <input type="text" id="inputEmail" name="username" class="form-control" placeholder="Username" autofocus required>
    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
    <button name="client" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    <a href="./signup.php" class="btn btn-lg btn-warning btn-block">Sign Up</a>
</form>
<div class="container form-signin">
    <form class="form" method="post" action="../controllers/signinController.php">
        <img class="mb-4" src="./assets/logo2.png" alt="" width="130">
        <h1 class="h3 mb-3 font-weight-normal">Continuar Como Invitado</h1>
        <div class="form-group">
            <input type="number" id="inputPassword" name="cedula" class="form-control" placeholder="Cedula" required>
            <input type="email" id="inputEmail" name="guest_email" class="form-control" placeholder="Email" required>
            <br>
            <button name="guest" class="btn btn-lg btn-info btn-block" type="submit">Conituar Como Invitado</button>
        </div>
    </form>
</div>



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
