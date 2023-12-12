<?php
    require_once "helpers/funciones.php";
    session_start();

    generarHead('mis-albumes', 'respuesta-usuario');
?>
<body>
    <?php
        require_once "inc/header.php";
    ?>
    <main>
        <h2>Mis álbumes</h2>
        <div id="datos-usuario">
            <?php
                foreach($resultado_album as $fila) {
                    echo <<<hereDOC
                        <h3>
                            <a href = "ver-album-priv.php?id={$fila["IdAlbum"]}">{$fila["Titulo"]}</a>
                        </h3>
                        <p>{$fila["Descripcion"]}</p>
                        <hr>
                    hereDOC;
                }
                echo <<<hereDOC
                    <p>
                        <a href = "mis-fotos.php?id={$_GET["id"]}">Ver todas las fotos</a>
                    </p>
                hereDOC;
            ?>
        </div>
    </main>
    <?php
        require_once "inc/footer.php";
    ?>
</body>
</html>
