<?php
    require_once "helpers/funciones.php";

    generarHead('resultado');

    $conexion = abrirConexion();
?>
<body>
    <?php
        require_once "inc/header.php";
    ?>
    <main>
        <?php
            list($titulo, $desde, $hasta, $pais) = array(
                $_POST["titulo"] ?? "",
                $_POST["fecha-desde"] ?? "",
                $_POST["fecha-hasta"] ?? "",
                $_POST["pais"] ?? -1
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
            if($desde != "") {
                $sql .= "AND Fecha >= '$desde'";
            }
            if($hasta != "") {
                $sql .= "AND Fecha <= '$hasta'";
            }
            if($pais > -1) {
                $sql .= "AND Pais = $pais";
            }
            $sql .= ";";
            $resultado = $conexion->query($sql);
            $nombre_pais = pillarFila($resultado, 0)["NomPais"];
            echo <<<hereDOC
                <div class="tab-busc">
                    <div class="omrs-input-group">
                        <label class="omrs-input-filled">
                            <input type="text" placeholder=" " name="titulo" id="titulo" value="$titulo" disabled>
                            <span class="omrs-input-label">Titulo</span>
                        </label>
                    </div>
                    <div class="omrs-input-group">
                        <label class="omrs-input-filled">
                            <input type="date" placeholder=" " name="fecha-desde" id="fecha-desde" value="$desde" disabled>
                            <span class="omrs-input-label">Desde</span>
                        </label>
                    </div>
                    <div class="omrs-input-group">
                        <label class="omrs-input-filled">
                            <input type="date" placeholder=" " name="fecha-hasta" id="fecha-hasta" value="$hasta" disabled>
                            <span class="omrs-input-label">Hasta</span>
                        </label>
                    </div>
                    <div class="omrs-input-group">
                        <label class="omrs-input-filled">
                            <select name="pais" id="paises" disabled>
                                <option value="$pais" selected disabled>$nombre_pais</option>
                            </select>
                            <span class="omrs-input-label">País</span>
                        </label>
                    </div>
                </div>
                <h1 class="titulo-index">Resultados</h1>
                <section class="grid-img">
            hereDOC;
            while($fila = $resultado->fetch_assoc()) {
                echo <<<hereDOC
                    <article>
                        <h2>{$fila["Titulo"]}</h2>
                        <a href="detalle.php?id={$fila["IdFoto"]}">
                            <img src="{$fila["Fichero"]}" alt="{$fila["Alternativo"]}">
                        </a>
                        <p>$nombre_pais</p>
                        <time>{$fila["Fecha"]}</time>
                    </article>
                hereDOC;
            }
        ?>
        </section>
    </main>
<?php
    require_once "inc/footer.php";
?>
</body>
</html>
