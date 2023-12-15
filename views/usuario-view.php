<?php
    require_once "helpers/funciones.php";
    
    generarHead('usuario');

    if(!isset($_SESSION["usuario"])) {
        redirigir('index.php');
    }
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
                    <button type="button">Cambiar</button>
                </p>
                <?php
                    $sql = "
                        SELECT u.*, NomPais
                        FROM usuarios u
                        JOIN paises ON(IdPais = Pais)
                        WHERE NomUsuario = '{$_SESSION["usuario"]}'
                    ;";
                    if($resultado_usuario != null) {
                        $fila = $resultado_usuario[0];
                        echo <<<hereDOC
                            <p>Nombre: {$fila["NomUsuario"]}</p>
                            <p>Correo: {$fila["Email"]}</p>
                            <p>Ciudad: {$fila["Ciudad"]}</p>
                            <p>Pais: {$fila["NomPais"]}</p>
                            </div>
                            <div id="funciones">
                                <p>
                                    <a href="mis-datos.php?id={$fila["IdUsuario"]}">Mis datos</a>
                                </p>
                                <p>
                                    <a href="mis-albumes.php?id={$fila["IdUsuario"]}">Mis álbumes</a>
                                </p>
                                <p>
                                    <a href="crear-album.php?id={$fila["IdUsuario"]}">Crear álbum</a>
                                </p>
                                <p>
                                    <a href="solicitar-album.php?id={$fila["IdUsuario"]}">Solicitar álbum</a>
                                </p>
                                <p>
                                    <a href="configurar.php?id={$fila["IdUsuario"]}">Configurar estilos</a>
                                </p>
                                <p>
                                    <a href="publicar.php?id={$fila["IdUsuario"]}">Añadir foto a álbum</a>
                                </p>
                                <p>
                                    <a href="eliminar-cuenta.php?id={$fila["IdUsuario"]}">Eliminar cuenta</a>
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
                    }
                ?>
        </section>
    </main>
    <?php
        require_once "inc/footer.php";
    ?>
</body>
</html>
