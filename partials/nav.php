
<nav class="nav">
    
    <div>
    <img class ="logo" src="./imgs/image.png" alt="">
  
    <a class ="boton" href="./index.php">Inicio</a>
    <a class ="boton" href="./catalogo.php">Catálogo</a>
    </div>

    <?php if (isset($_SESSION["usuario_logged"])) { ?>
        <div>
        <a  class ="boton" href="./dashboard.php">Dashboard</a>

        <?php if ($_SESSION["role"] === "admin") { ?>
            <a class ="boton" href="./add_item.php">Añadir elemento</a>
        <?php } ?>

        

        <a class ="boton" href="./controllers/logout.php">Cerrar sesión</a>
        </div>

            <p class ="boton1" >(づ๑•ᴗ•๑)づ <?=  $_SESSION["usuario_logged"] ?></p>
            </div>  

    <?php } else { ?>

        <a class ="boton" href="./login.php">Iniciar sesión</a>

    <?php } ?>
</nav>
