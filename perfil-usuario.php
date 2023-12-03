<?php
    require_once "helpers/funciones.php";
    session_start();

    generarHead('perfil-usuario', 'respuesta-usuario');

    $conexion = abrirConexion();
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
                    $sql = "
                        SELECT
                            u.NomUsuario,
                            u.Foto,
                            u.FRegistro,
                            a.IdAlbum,
                            a.Titulo,
                            a.Descripcion
                        FROM albumes a
                        JOIN usuarios u ON(a.Usuario = u.IdUsuario)
                        WHERE u.IdUsuario = {$_GET["id"]}
                    ;";
                    if($resultado = $conexion->query($sql)) {
                        $fila = pillarFila($resultado, 0);
                        echo <<<hereDOC
                            <img href="{$fila["Foto"]} alt="Foto de perfil">
                            <p>Nombre de usuario: {$fila["NomUsuario"]}</p>
                            <p>Fecha de incorporación: {$fila["FRegistro"]}</p>
                            <hr>
                            <h3>Lista de álbumes: </h3>
                        hereDOC;
                        while($fila = $resultado->fetch_assoc()) {
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
                        cerrarConexion($resultado, $conexion);
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
