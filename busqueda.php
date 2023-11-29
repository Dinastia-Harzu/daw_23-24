<?php
    require_once "helpers/funciones.php";

    $conexion = abrirConexion();

    generarHead('Descubrir - Masthermatika', 'oscuro');
?>
<body>
    <?php
        include_once "inc/header.php";
    ?>
    <main id="grid-params">
        <h1>Descubre</h1>
        <form action="resultado.php" method="post" class="tab-busc tab-params">
            <section >
                <h2>Introduce los parámetros de búsqueda:</h2>
                <div class="omrs-input-group">
                    <label class="omrs-input-filled">
                        <input type="text" placeholder=" " name="titulo" id="titulo">
                        <span class="omrs-input-label">Titulo</span>
                    </label>
                </div>
                <div class="omrs-input-group">
                    <label class="omrs-input-filled">
                        <input type="date" placeholder=" " name="fecha-desde" id="fecha-desde">
                        <span class="omrs-input-label">Desde</span>
                    </label>
                </div>
                <div class="omrs-input-group">
                    <label class="omrs-input-filled">
                        <input type="date" placeholder=" " name="fecha-hasta" id="fecha-hasta">
                        <span class="omrs-input-label">Hasta</span>
                    </label>
                </div>
                <div class="omrs-input-group">
                    <label class="omrs-input-filled">
                        <select name="pais" id="paises">
                            <option value="-1" selected disabled>-- Selecciona una opcion --</option>
                            <?php
                                if($resultado = $conexion->query("SELECT * FROM paises")) {
                                    while($fila = $resultado->fetch_assoc()) {
                                        $pais = $fila["NomPais"];
                                        echo '<option value="' . $fila["IdPais"] . '">' . $pais . '</option>';
                                    }
                                    $resultado->free();
                                }
                            ?>
                        </select>
                        <span class="omrs-input-label">País</span>
                    </label>
                </div>
            </section>
            <div class="campo-boton-submit">
                <button type="submit">Buscar</button>
            </div>
        </form>
    </main>
<?php
    include_once "inc/footer.php";
?>
</body>
</html>