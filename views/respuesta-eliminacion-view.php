<?php
    require_once "helpers/funciones.php";
    session_start();

    generarHead(pagina:'respuesta-eliminacion', estilo:'respuesta-usuario');
?>
<body>
    <?php
        require_once "inc/header.php";
    
        $mensaje = "Se ha borrado tu cuenta correctamente";

        if($_POST["clave"] != $resultado_usuario_clave[0]["Clave"]) {
            $mensaje = "La contraseña es incorrecta, no se ha borrado la cuenta";
        }

    ?>
        <main>
        <h2><?= $mensaje ?><h2>
        </main>

    <?php
        require_once "inc/footer.php";
    ?>
</body>
</html>