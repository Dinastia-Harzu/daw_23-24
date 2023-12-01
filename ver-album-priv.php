<?php
    require_once "helpers/funciones.php";

    generarHead('ver-album-priv', 'detalle');

    $conexion = abrirConexion();
?>
<body>
    <?php
        require_once "inc/header.php";
    ?>
    <main>
        <section id="foto">
            <section>
                <h2>Fotografías del álbum</h2>
                <?php
                    $resultado = $conexion->query("
                        SELECT
                            f.Titulo TituloFoto,
                            f.Fichero,
                            f.Alternativo,
                            DATE_FORMAT(f.Fecha, '%e/%c/%Y') Fecha,
                            a.IdAlbum,
                            a.Titulo TituloAlbum,
                            a.Descripcion
                        FROM fotos f
                        JOIN albumes a ON(f.Album = a.IdAlbum)
                        WHERE f.Album = {$_GET["id"]}
                        ORDER BY f.Fecha ASC;
                    ;");
                    $paises = $conexion->query("
                        SELECT DISTINCT p.NomPais
                        FROM fotos f
                        JOIN albumes a ON(f.Album = a.IdAlbum)
                        JOIN paises p ON(f.Pais = p.IdPais)
                        WHERE f.Album = {$_GET["id"]};
                    ;");
                    if($resultado && $paises) {
                        while($fila = mysqli_fetch_assoc($resultado)) {
                            echo <<<hereDOC
                                <p>
                                    <img src="{$fila["Fichero"]}" alt="{$fila["Alternativo"]}">
                                </p>
                            hereDOC;
                        }
                        $primera_fila = pillarFila($resultado, 0);
                        echo <<<hereDOC
                            </section>
                            <section id="info-foto">
                                <h1>Información del álbum <em>{$primera_fila["TituloAlbum"]}</em></h1>
                                <p>{$primera_fila["Descripcion"]}</p>
                                <p>Nº de fotografías del álbum: {$resultado->num_rows}</p>
                                <p>Paises donde se tomaron fotografías:</p>
                                <ul class="lista-info-album">
                        hereDOC;
                        while($fila = mysqli_fetch_assoc($paises)) {
                            echo '<li>' . $fila["NomPais"] . '</li>';
                        }
                        $ultima_fila = pillarFila($resultado, $resultado->num_rows - 1);
                        echo <<<hereDOC
                            </ul>
                            <p>
                                Fecha de la primera foto:
                                <time>{$primera_fila["Fecha"]}</time>
                            </p>
                            <p>
                                Fecha de la última foto:
                                <time>{$ultima_fila["Fecha"]}</time>
                            </p>
                            <hr>
                            <p>
                                <a href="publicar.php?id={$ultima_fila["IdAlbum"]}">Añadir foto a álbum</a>
                            </p>
                        hereDOC;
                        $paises->close();
                        cerrarConexion($resultado, $conexion);
                    }
                ?>
            </section>
        </section>
    </main>
    <?php
        require_once "inc/footer.php";
    ?>
</body>
</html>
