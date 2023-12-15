<?php
    require_once "helpers/funciones.php";
    session_start();

    generarHead(pagina:'respuesta-crear-album', estilo:'respuesta-usuario');
?>
<body>
    <?php
        require_once "inc/header.php";
    ?>
    <main>
        <h2>Inserción realizada, el nuevo álbum es:<h2>
        <section>
            <div id="datos-usuario">
                <p>Titulo: <?= $_POST["titulo"] ?></p>
                <p>Descripción: <?= $_POST["descripcion"] ?></p>
            </div>
            <hr>
                <p>¿Quieres incluir una nueva foto en el álbum?</p>
                <p><a href="publicar.php?id=<?= $_GET["id"] ?>">Añadir foto</a><p>
        </section>
    </main>
    <?php
        require_once "inc/footer.php";
    ?>
</body>
</html>