<?php 
    session_start();
    if(isset($_GET['logout'])){
        session_destroy();
    }

    if(isset($_SESSION['user'])) {
        header('Location: bienvenida.php');
    }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookies y Sesiones</title>
    <link rel="icon" href="#">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>

<body class="bg-light p-5">

    <main class="p-5">
        <form class="p-5" action="index.php" method="POST">
            <h1>Usuario</h1>
            <input type="user" name="user" class="form-control" placeholder="Introduzca su usuario">
            <button type="submit" class="btn btn-primary mt-3">Enviar</button>
        </form>
    </main>

    <?php
    if(isset($_POST['user']) && !empty($_POST['user'])){
        $user = $_POST['user'];
        $_SESSION['user'] = $user;

        if(isset($_COOKIE[$user])) {
            setcookie($user, $_COOKIE[$user]+1, time()+3600);
        } else {
            setcookie($user, 1, time()+3600);
        }
        header('Location: bienvenida.php');
    }

    ?>

</body>
</html>