<?php
    require_once "helpers/funciones.php";

    generarHead('mis-fotos', 'detalle', impresion: true);

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
        <?php
            $sql = "
                SELECT
                    f.Titulo AS TituloFoto,
                    DATE_FORMAT(f.FRegistro,'%e/%c/%Y') as Fecha,
                    f.Descripcion,
                    f.Alternativo,
                    Fichero,
                    NomPais,
                    a.IdAlbum,
                    a.Titulo AS TituloAlbum
                FROM fotos f
                JOIN paises p ON(p.IdPais = f.Pais)
                JOIN albumes a ON(a.IdAlbum = f.Album);
            ;";
            if($resultado = $conexion->query($sql)) {
                while($fila = $resultado->fetch_assoc()) {
                    echo <<<hereDOC
                        <section id="foto">
                            <img src="{$fila["Fichero"]}" alt="{$fila["Alternativo"]}">
                            <section id="info-foto">
                                <h1>{$fila["TituloFoto"]}</h1>
                                <p>
                                    Publicado en
                                    <time>{$fila["Fecha"]}</time>
                                </p>
                                <p>{$fila["NomPais"]}</p>
                                <p>{$fila["Descripcion"]}</p>
                                <p>
                                    <a href="ver-album-priv.php?id={$fila["IdAlbum"]}">{$fila["TituloAlbum"]}</a>
                                </p>
                            </section>
                        </section>
                    hereDOC;
                }
                cerrarConexion($resultado, $conexion);
            }
        ?>
    </main>
    <?php
        require_once "inc/footer.php";
    ?>
</body>
</html>
