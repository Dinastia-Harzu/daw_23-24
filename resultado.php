<?php
    require_once "helpers/funciones.php";

    generarHead();
?>
<body>
    <?php
        include_once "inc/header-no-registrado.php";
    ?>
    <figure>
        <img src="img/logo-y-nombre.png" alt="Logo, nombre y subtítulo de la página: Masthermatika">
    </figure>
    <main>
        <?php {
            $fecha = array_fill(0, 2, "");
            list($titulo, $fecha[0], $fecha[1], $pais) = array(
                $_POST["titulo"] ?? "",
                $_POST["fecha-desde"] ?? "",
                $_POST["fecha-hasta"] ?? "",
                $_POST["pais"]
            );
            $sql = "
                SELECT f.*, a.Titulo TituloAlbum, a.Descripcion DescripcionAlbum, NomPais
                FROM fotos f
                JOIN albumes a ON(Album = IdAlbum)
                JOIN paises p ON(Pais = IdPais)
                WHERE 1 = 1
            ";
            if($titulo != "") {
                $sql .= "AND Titulo = LOWER('$titulo')";
            }
            if($fecha[0] != "") {
                $sql .= "AND Fecha >= '$fecha[0]'";
            }
            if($fecha[1] != "") {
                $sql .= "AND Fecha <= '$fecha[1]'";
            }
            if($pais > -1) {
                $sql .= "AND Pais = $pais";
            }
            $sql .= ";";
            echo <<<hereDOC
                <div class="tab-busc">
                    <p>
                        <label>Título: $titulo</label>
                    </p>
                    <p>
                        <label class="tab-busc-fecha">Fecha entre: {$fecha[0]} y {$fecha[1]}</label>
                    </p>
                    <p>
                        <label>País: $pais</label>
                    </p>
                </div>
                <h1 class="titulo-index">Resultados</h1>
                <section class="grid-img">
                    <article>
                        <h2>Título imagen</h2>
                        <a href="detalle.php">
                            <img src="img/foto1.png" alt="Última foto #1">
                        </a>
                        <p>País</p>
                        <time>2023</time>
                    </article>
                    <article>
                        <h2>Título imagen</h2>
                        <a href="detalle.php">
                            <img src="img/foto2.png" alt="Última foto #2">
                        </a>
                        <p>País</p>
                        <time>2023</time>
                    </article>
                    <article>
                        <h2>Título imagen</h2>
                        <a href="detalle.php">
                            <img src="img/foto3.png" alt="Última foto #3">
                        </a>
                        <p>País</p>
                        <time>2023</time>
                    </article>
                    <article>
                        <h2>Título imagen</h2>
                        <a href="detalle.php">
                            <img src="img/foto4.png" alt="Última foto #4">
                        </a>
                        <p>País</p>
                        <time>2023</time>
                    </article>
                    <article>
                        <h2>Título imagen</h2>
                        <a href="detalle.php">
                            <img src="img/foto5.png" alt="Última foto #5">
                        </a>
                        <p>País</p>
                        <time>2023</time>
                    </article>
                </section>
            hereDOC;
        } ?>
    </main>
<?php
    include_once "inc/footer.php";
?>
</body>
</html>