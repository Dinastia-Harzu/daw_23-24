<?php
    require_once "helpers/funciones.php";
    session_start();

    generarHead(pagina:'respuesta-publicar', estilo:'respuesta-usuario');
?>
<body>
    <?php
        require_once "inc/header.php";
    ?>
    <main>
        <h2>Inserción realizada, la nueva foto es:<h2>
        <section>
            <div id="datos-usuario">
                <p>Titulo: <?= $_POST["titulo"] ?></p>
                <p>Descripción: <?= $_POST["descripcion"] ?></p>
                <p>Fecha: <?= $fechaFormateada ?></p>
                <p>Pais: <?= $nombre_pais_publicar[0]["NomPais"] ?></p>
                <p>Texto Alternativo: <?= $_POST["texalt"] ?></p>
            </div>
        </section>
    </main>
    <?php
        require_once "inc/footer.php";
    ?>
</body>
</html>