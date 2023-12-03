<?php
    require_once "helpers/funciones.php";
    session_start();

    generarHead('ver-album', 'detalle');

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
                            a.Titulo TituloAlbum,
                            a.Descripcion
                        FROM fotos f
                        JOIN albumes a ON(f.Album = a.IdAlbum)
                        WHERE f.Album = {$_GET["id"]}
                        ORDER BY f.Fecha ASC;
                    ");
                    $paises = $conexion->query("
                        SELECT DISTINCT p.NomPais
                        FROM fotos f
                        JOIN albumes a ON(f.Album = a.IdAlbum)
                        JOIN paises p ON(f.Pais = p.IdPais)
                        WHERE f.Album = {$_GET["id"]};
                    ");
                    if($resultado && $paises) {
                        while($fila = $resultado->fetch_assoc()) {
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
                                    <h1>Información del álbum - {$primera_fila["TituloAlbum"]}</h1>
                                    <p>{$primera_fila["Descripcion"]}</p>
                                    <p>Nº de fotografías del álbum: {$resultado->num_rows}</p>
                                    <p>Paises donde se tomaron fotografías:</p>
                                    <ul class="lista-info-album">
                        hereDOC;
                        while($fila = $paises->fetch_assoc()) {
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
                        hereDOC;
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
