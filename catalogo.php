


<?php
include("./config.php");
include("./data.php");
require("./controllers/tarjeta.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">

</head>
<body>
    <?php
    include_once("./partials/header.php");
    include_once("./partials/nav.php");

    ?>


<form action="" method="get" class = "elegirGenero">
    <label for="genero"> </label>

    <select name="genero" id="genero" onchange="this.form.submit()">
        <option value="" <?= isset($_GET["genero"]) ? "selected" : "" ?>>
            Todos los géneros
        </option>

        <option value="Acción y fantasía" <?= ($_GET["genero"] ?? "") == "Acción y fantasía" ? "selected" : "" ?>>
            Acción y fantasía
        </option>

        <option value="Superhéroes y acción" <?= ($_GET["genero"] ?? "") == "Superhéroes y acción" ? "selected" : "" ?>>
            Superhéroes y acción
        </option>

        <option value="Acción y drama" <?= ($_GET["genero"] ?? "") == "Acción y drama" ? "selected" : "" ?>>
            Acción y drama
        </option>

        <option value="Aventura y acción" <?= ($_GET["genero"] ?? "") == "Aventura y acción" ? "selected" : "" ?>>
            Aventura y acción
        </option>

        <option value="Suspense y psicológico" <?= ($_GET["genero"] ?? "") == "Suspense y psicológico" ? "selected" : "" ?>>
            Suspense y psicológico
        </option>
    </select>
</form>

<section class="mostrarPeliculas">
<main class = "catalogo">
<?php
if (isset($_GET["genero"]) && !$_GET["genero"]=="") {
    $arrayGeneros = [];

    foreach ($animes as $e) {
        if ($e["genero"] == $_GET["genero"]) {
            $arrayGeneros[] = $e;
        }
    }
    ?>
    <section class ="animesAdd">
        <?php
    mostrar($arrayGeneros);
    ?>
    </section>
    <?php
} else { ?>
    <section class = "animesAdd">
        <?php
    mostrar($animes);
    ?>
    </section>
    <?php
}
?>



</section>
</main>







<?php
include("./partials/footer.php");
?>


</body>
</html>