<?php
    require_once "helpers/funciones.php";
    session_start();

    generarHead('detalle');

    if(!isset($_SESSION["usuario"])) {
        header("Location: index.php");
    }
?>
<body>
    <?php
        require_once "inc/header.php";
    ?>
    <main>
        <section id="foto">
            <?php
                $fila = $resultado_foto_detalle[0];
                echo <<<hereDOC
                    <img src="{$fila["Fichero"]}" alt="Foto matemática">
                    <section id="info-foto">
                        <h1>{$fila["TituloFoto"]}</h1>
                        <p>
                            Publicado en
                            <time>{$fila["Fecha"]}</time>
                        </p>
                        <p>{$fila["NomPais"]}</p>
                        <p>{$fila["Descripcion"]}</p>
                        <p>
                            <a href="ver-album.php?id={$fila["IdAlbum"]}">{$fila["TituloAlbum"]}</a>
                        </p>
                        <p>
                            <a href="perfil-usuario.php?id={$fila["IdUsuario"]}">{$fila["NomUsuario"]}</a>
                        </p>
                    </section>
                hereDOC;
            ?>
        </section>
    </main>
    <?php
        require_once "inc/footer.php";
    ?>
</body>
</html>
