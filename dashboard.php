
<?php
require_once("./config.php");
require_once("./data.php");
require_once("./controllers/tarjeta.php");



if (!isset($_SESSION["usuario_logged"])) {
    header("Location: ./login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de animes</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>

    <?php include_once("./partials/header.php"); ?>
    <?php include_once("./partials/nav.php"); ?>
    <main>
        <section class = "texto">
            <div>
                <h2>Bienvenido, <?= $_SESSION["usuario_logged"] ?> :</h2  >
                </div>
            <div>
                <p>Tu rol es: <?= $_SESSION["role"] ?></p>
            </div>

        <p>Total de elementos del catálogo: <?= count($animes) ?></p>
        </section>

        <section class="animesAdd">
        <?php mostrar($animes); ?>
        </section>
         </main>

</body>

</html>

<?php
include("./partials/footer.php");
?>
