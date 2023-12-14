<?php
    require_once "helpers/funciones.php";
    session_start();

    generarHead(pagina:'respuesta-eliminacion', estilo:'respuesta-usuario');
?>
<body>
    <?php
        require_once "inc/header.php";
    
        $mensaje = "<h2>La contraseña es incorrecta, no se ha borrado la cuenta</h2>";
        $enlace = "<a href=\"eliminar-cuenta.php?id={$_GET["id"]}\">Volver atrás</a>";

        if($_POST["clave"] == $resultado_usuario_clave[0]["Clave"]) {
            // Borramos la cuenta del usuario
            BorrarUsuario();
            $mensaje = "<h2>Se ha borrado tu cuenta correctamente</h2>";
            $enlace = "<a href=\"index.php\">Volver a la página principal</a>";
            session_destroy();
            $_SESSION = array();
        }

    ?>
        <main>
        <?= $mensaje ?>
        <?= $enlace ?>
        </main>

    <?php
        require_once "inc/footer.php";
    ?>
</body>
</html>