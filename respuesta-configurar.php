<?php
    require_once "helpers/funciones.php";
    session_start();

    generarHead(pagina:'respuesta-crear-album', estilo:'respuesta-usuario');

    if($tema = $_POST["tema"] ?? $_SESSION["tema"] ?? false) {
        $_SESSION["tema"] = $tema;
    } else {
        $tema = 'oscuro';
    }

    generarHead('respuesta-configuracion', 'respuesta-usuario');
    cambiarEstiloUsuario();
?>
<body>
    <?php
        require_once "inc/header.php";
    ?>
    <main>
        <h2>¡Configuración realizada correctamente!<h2>
        <p><a href="usuario.php">Volver a la página de usuario</a></p>
    </main>
    <?php
        require_once "inc/footer.php";
    ?>
</body>
</html>