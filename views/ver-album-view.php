<?php
    require_once "helpers/funciones.php";
    session_start();

    generarHead('ver-album', 'detalle');
?>
<body>
    <?php
        require_once "inc/header.php";
    ?>
    <main>
        <section id="foto">
            <section>
                <h2>Fotografías del álbum</h2>
                <?php
                    foreach($resultado_foto_veralbum as $fila) {
                        echo <<<hereDOC
                            <p>
                                <img src="{$fila["Fichero"]}" alt="{$fila["Alternativo"]}">
                            </p>
                        hereDOC;
                    }
                    $primera_fila = $resultado_foto_veralbum[0];
                    $num_fotos = count($resultado_foto_veralbum);
                    echo <<<hereDOC
                            </section>
                            <section id="info-foto">
                                <h1>Información del álbum - <em>{$primera_fila["TituloAlbum"]}</em></h1>
                                <p>{$primera_fila["Descripcion"]}</p>
                                <p>Nº de fotografías del álbum: {$num_fotos} </p>
                                <p>Paises donde se tomaron fotografías:</p>
                                <ul class="lista-info-album">
                    hereDOC;
                    foreach($resultado_foto_paises_album as $fila) {
                        echo '<li>' . $fila . '</li>';
                    }
                    $ultima_fila = $resultado_foto_veralbum[count($resultado_foto_veralbum) - 1];
                    echo <<<hereDOC
                        </ul>
                        <p>
                            Fecha de la primera foto:
                            <time>{$primera_fila["Fecha"]}</time>
                        </p>
                        <p>
                            Fecha de la última foto:
                            <time>{$ultima_fila["Fecha"]}</time>
                        </p>
                    hereDOC;
                ?>
            </section>
        </section>
    </main>
    <?php
        require_once "inc/footer.php";
    ?>
</body>
</html>
