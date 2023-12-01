<?php
    require_once "helpers/funciones.php";

    generarHead('usuario');

    if(!isset($_SESSION["usuario"])) {
        header("Location: index.php");
    }

    $conexion = abrirConexion();
?>
<body>
    <?php
        require_once "inc/header.php";
    ?>
    <main id="tab-usuario">
        <h1>Usuario</h1>
        <section id="datos-usu">
            <div>
                <h2>Mis datos</h2>
                <p>
                    <p>
                        <label for="pfp"><img src="img/placeholder.png" alt="Foto de perfil"></label>
                    </p>
                    <p>
                        <input type="file" name="pfp" id="pfp">
                    </p>
                    <button type="button">"Cambiar"</button>
                </p>
                <?php
                    $sql = "
                        SELECT u.*, NomPais, IdAlbum
                        FROM usuarios u
                        JOIN paises ON(IdPais = Pais)
                        JOIN albumes ON(Usuario = IdUsuario)
                        WHERE NomUsuario = '{$_SESSION["usuario"]}'
                    ;";
                    if($resultado = $conexion->query($sql)) {
                        $fila = $resultado->fetch_assoc();
                        echo <<<hereDOC
                            <p>Nombre: {$fila["NomUsuario"]}</p>
                            <p>Correo: {$fila["Email"]}</p>
                            <p>Ciudad: {$fila["Ciudad"]}</p>
                            <p>Pais: {$fila["NomPais"]}</p>
                            </div>
                            <div id="funciones">
                                <p>
                                    <a href="mis-datos.php?usu={$fila["NomUsuario"]}">Mis datos</a>
                                </p>
                                <p>
                                    <a href="mis-albumes.php?id={$fila["IdAlbum"]}">Mis álbumes</a>
                                </p>
                                <p>
                                    <a href="crear-album.php">Crear álbum</a>
                                </p>
                                <p>
                                    <a href="solicitar-album.php">Solicitar álbum</a>
                                </p>
                                <p>
                                    <a href="configurar.php">Configurar estilos</a>
                                </p>
                                <p>
                                    <a href="publicar.php">Añadir foto a álbum</a>
                                </p>
                                <p>
                                    <a href="index.php">Volver a inicio</a>
                                </p>
                                <form action="control-usuario.php" method="post">
                                    <input type="hidden" name="cerrar-sesion" value="true">
                                    <button type="submit">Cerrar sesión</button>
                                </form>
                            </div>
                        hereDOC;
                        cerrarConexion($resultado, $conexion);
                    }
                ?>
        </section>
    </main>
    <?php
        require_once "inc/footer.php";
    ?>
</body>
</html>
