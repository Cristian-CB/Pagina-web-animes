<?php
require("./config.php");
require("./data.php");
require("./controllers/tarjeta.php");

include("./partials/header.php");
include("./partials/nav.php");




if (isset($_SESSION["usuario_logged"])) {
    if($_SESSION["role"]!="admin"){
        header("Location: ./dashboard.php");
        exit();
    }
    
}
else{
     header("Location: ./login.php");
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
<body>
    


<form action="" method="post"  class = "inicioSesion1">
 <img src="./imgs/image.png" alt="" class="logo2">
    <H2>Añadir animes</H2>
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" required>

    <label for="imagen">Imagen:</label>
    <input type="file" name="imagen" id="imagen" required>

    <label for="destacado">¿Destacado?</label>
    <select name="destacado" id="destacado">    
        <option value="true">Sí</option>
        <option value="false">No</option>
    </select>

    <label for="genero">Género:</label>
    <input type="text" name="genero" id="genero" required>

    <label for="estudio">Estudio:</label>
    <input type="text" name="estudio" id="estudio" required>

    <label for="episodios">Episodios:</label>
    <input type="number" name="episodios" id="episodios" min="1" required>

    <label for="puntuacion">Puntuación:</label>
    <input type="number" name="puntuacion" id="puntuacion"
           min="0" max="10" step="0.1" required>

    <label for="estado">Estado:</label>
    <select name="estado" id="estado">
        <option value="En emisión">En emisión</option>
        <option value="Finalizado">Finalizado</option>
    </select>

    <button type="submit" name="enviar">Añadir anime</button>

</form>
<?php
if($_SERVER["REQUEST_METHOD"]==="POST"){

$anime = [
    "nombre" => $_POST["nombre"],
    "imagen" => RUTA_IMAGENES . $_POST["imagen"],
    "destacado" => $_POST["destacado"],
    "genero" => $_POST["genero"],
    "estudio" => $_POST["estudio"],
    "puntuacion" => $_POST["puntuacion"],
    "episodios" => $_POST["episodios"],
    "estado" => $_POST["estado"]
];

?>
    <h2 class ="tituloAddAnime">Animes añadidos:</h2>
<section class = "animesAdd">
    <div>
<?php
mostrar([$anime]);
?>
</div>
</section>

<?php
}
?>
<?php
include("./partials/footer.php");
?>
</body>
</html>