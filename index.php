
<?php
require("./config.php");
require("./data.php");
require("./controllers/tarjeta.php");

include("./partials/header.php");
include("./partials/nav.php");
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
    <h2 class = "tituloIndex"> Animes destacados</h2>
    <main class = "mainIndex">
<?php
$destacados = [];
foreach($animes as $a){
if($a["destacado"]===true){
    $destacados[]=$a;
}

} ?>


<section class ="animesAdd">

<?php
mostrar($destacados);
?>
</section>
</main>
<?php
include("./partials/footer.php");
?>

</body>
</html>