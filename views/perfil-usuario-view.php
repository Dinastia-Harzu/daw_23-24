<?php
    require_once "helpers/funciones.php";
    session_start();

    generarHead('perfil-usuario', 'respuesta-usuario');
?>
<body>
    <?php
        require_once "inc/header.php";
    ?>
    <main>
        <section>
        <h1>Perfil del usuario</h1>
            <div id="datos-usuario">
                <?php
                    $fila = $resultado_album_perfil[0];
                    echo <<<hereDOC
                        <img href="{$fila["Foto"]} alt="Foto de perfil">
                        <p>Nombre de usuario: {$fila["NomUsuario"]}</p>
                        <p>Fecha de incorporación: {$fila["FRegistro"]}</p>
                        <hr>
                        <h3>Lista de álbumes: </h3>
                    hereDOC;
                    foreach($resultado_album_perfil as $fila) {
                        echo <<<hereDOC
                            <article>
                                <p>
                                    <a href="ver-album.php?id={$fila["IdAlbum"]}">{$fila["Titulo"]}</a>
                                </p>
                                <p>{$fila["Descripcion"]}</p>
                                <hr>
                            </article>
                        hereDOC;
                    }
                ?>
            </div>
        </section>
    </main>
    <?php
        require_once "inc/footer.php";
    ?>
</body>
</html>
