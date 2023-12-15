<?php
    require_once "helpers/funciones.php";
    session_start();

    generarHead('mis-fotos', 'detalle', impresion: true);

    if(!isset($_SESSION["usuario"])) {
        header("Location: index.php");
    }
?>
<body>
    <?php
        require_once "inc/header.php";
    ?>
    <main>
        <?php
            foreach($resultado_foto_misfotos as $fila) {
                echo <<<hereDOC
                    <section id="foto">
                        <img src="{$fila["Fichero"]}" alt="{$fila["Alternativo"]}">
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
                        </section>
                    </section>
                hereDOC;
            } 
        ?>
    </main>
    <?php
        require_once "inc/footer.php";
    ?>
</body>
</html>
