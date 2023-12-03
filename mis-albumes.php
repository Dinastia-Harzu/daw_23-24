<?php
    require_once "helpers/funciones.php";
    session_start();

    generarHead('mis-albumes', 'respuesta-usuario');

    $conexion = abrirConexion();
?>
<body>
    <?php
        require_once "inc/header.php";
    ?>
    <main>
        <h2>Mis álbumes</h2>
        <div id="datos-usuario">
            <?php
                $sql = "
                    SELECT *
                    FROM albumes
                    WHERE Usuario = {$_GET["id"]}
                ;";
                if($resultado = $conexion->query($sql)) {
                    while($fila = $resultado->fetch_assoc()) {
                        echo <<<hereDOC
                            <h3>
                                <a href = "ver-album-priv.php?id={$fila["IdAlbum"]}">{$fila["Titulo"]}</a>
                            </h3>
                            <p>{$fila["Descripcion"]}</p>
                            <hr>
                        hereDOC;
                    }
                    cerrarConexion($resultado, $conexion);
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
