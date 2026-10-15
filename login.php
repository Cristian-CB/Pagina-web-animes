<?php


require_once("./config.php");


if(isset($_SESSION["usuario_logged"])){
    header("Location: ./dashboard.php");
    exit();
}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
    </head>
<body class = "inicio">

<form action="./controllers/middleware.php" method="post" class="inicioSesion">

    <img src="./imgs/image.png" alt="" class="logo1">
    <h2>Iniciar sesión en Anime-CB</h2>

    <input type="text" name="usuario" placeholder="Usuario" class="<?= isset($_GET['error']) ? 'input-error' : '' ?>">

    <input type="password" name="contraseña" placeholder="Contraseña" class="<?= isset($_GET['error']) ? 'input-error' : '' ?>">

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["error"])) {
        if ($_GET["error"] === "usuario-incorrrecto") {
            echo "<p class='error'>Usuario no encontrado</p>";
        } else if ($_GET["error"] === "contraseña-incorrecta") {
            echo "<p class='error'>Contraseña incorrecta</p>";
        } else {
            echo "<p class='error'>Acceso no permitido</p>";
        }
    }
    ?>

    <input type="submit" value="Iniciar sesión" id="botoncito">

    <a href="./index.php">Iniciar sesion mas tarde </a>

</form>



</body> 
</html>