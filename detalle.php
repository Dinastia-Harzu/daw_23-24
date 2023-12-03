<?php
    require_once "helpers/funciones.php";
    session_start();

    generarHead('detalle');

    if(!isset($_SESSION["usuario"])) {
        header("Location: index.php");
    }
?>
<body>
    <?php
        require_once "inc/header.php";

        $conexion = abrirConexion();
        $sql = "
            SELECT
                f.Titulo TituloFoto,
                DATE_FORMAT(f.FRegistro, '%e/%c/%Y') Fecha,
                Fichero,
                NomPais,
                f.Descripcion,
                IdAlbum,
                a.Titulo TituloAlbum,
                IdUsuario,
                u.NomUsuario
            FROM fotos f
            JOIN paises p ON(p.IdPais = f.Pais)
            JOIN albumes a ON(a.IdAlbum = f.Album)
            JOIN usuarios u ON(u.IdUsuario = a.Usuario)
            WHERE f.IdFoto = {$_GET["id"]}
        ;";

        $resultado = $conexion->query($sql);
        if(!$resultado || !$resultado->num_rows) {
            header('Location: 404.php');
            exit;
        }
        $fila = $resultado->fetch_assoc();
    ?>
    <main>
        <section id="foto">
            <?php
                echo <<<hereDOC
                    <img src="{$fila["Fichero"]}" alt="Foto matemática">
                    <section id="info-foto">
                        <h1>{$fila["TituloFoto"]}</h1>
                        <p>
                            Publicado en
                            <time>{$fila["Fecha"]}</time>
                        </p>
                        <p>{$fila["NomPais"]}</p>
                        <p>{$fila["Descripcion"]}</p>
                        <p>
                            <a href="ver-album.php?id={$fila["IdAlbum"]}">{$fila["TituloAlbum"]}</a>
                        </p>
                        <p>
                            <a href="perfil-usuario.php?id={$fila["IdUsuario"]}">{$fila["NomUsuario"]}</a>
                        </p>
                    </section>
                hereDOC;
            ?>
        </section>
    </main>
    <?php
        require_once "inc/footer.php";
    ?>
</body>
</html>
