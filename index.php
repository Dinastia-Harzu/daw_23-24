<?php

    require_once "helpers/funciones.php";

    generarHead('index', dialogos: true);

    if(!isset($_SESSION["usuario"])) {
        header("Location: index.no_registrado.php");
    }

    $conexion = abrirConexion();
?>
<body>
    <?php
        require_once "inc/header.php";
    ?>
    <main>
        <h1 class="titulo-index">Últimas imágenes</h1>
        <div class="grid-img">
            <?php
                $sql = "
                    SELECT
                        IdFoto,
                        Titulo,
                        DATE_FORMAT(FRegistro,'%e/%c/%Y') as Fecha,
                        Fichero,
                        Pais
                    FROM fotos
                ;";
                if($resultado = $conexion->query($sql)) {
                    while($fila = $resultado->fetch_assoc()) {
                        echo <<<hereDOC
                            <article>
                                <h2>{$fila["Titulo"]}</h2>
                                <a href="detalle.php?id={$fila["IdFoto"]}">
                                    <img src="{$fila["Fichero"]}" alt="Foto">
                                </a>
                                <p>{$fila["NomPais"]}</p>
                                <time>{$fila["Fecha"]}</time>
                            </article>
                        hereDOC;
                    }
                    cerrarConexion($resultado, $conexion);
                }
            ?>
        </div>
    </main>
    <?php
        require_once "inc/footer.php";
    ?>
</body>
</html>
