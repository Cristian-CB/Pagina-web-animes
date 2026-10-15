
<?php
function mostrar($animes) {
    foreach ($animes as $anime) { ?>

        <div class="itemAnime">
            <div class="item">
                <img class="imagen"
                     src="<?= $anime["imagen"] ?>"
                     alt="<?= $anime["nombre"] ?>">

                <div class="content">
                    <p class="genero">
                        <?= $anime["genero"] ?>
                    </p>

                    <p class="episodios">
                        <?= $anime["episodios"] ?>
                    </p>

                    <p class="puntuacion">
                        <?= $anime["puntuacion"] ?> ★
                    </p>
                </div>

                <?php if ($anime["estado"] != "En emisión") { ?>
                    <p class="disponible">Finalizado</p>
                <?php } ?>

            </div>

            <div>
                <p class="textoDebajo">
                    <?= $anime["nombre"] ?>
                </p>
            </div>
        </div>
        

    <?php }
}
?>
