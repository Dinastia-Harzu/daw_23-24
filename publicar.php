<?php
    require_once "helpers/funciones.php";
    session_start();

    generarHead('publicar', 'registro');

    $conexion = abrirConexion();
?>
<body>
    <?php
        require_once "inc/header.php";
    ?>
    <main>
        <div id="creacion-cuenta">
            <h1>Añadir foto</h1>
            <form action="gestionar-subidas.php" method="post" id="tab-reg">
                <section id="reg-1">
                    <h2>Introduce la información de la foto:</h2>
                    <div class="omrs-input-group">
                        <label class="omrs-input-filled">
                            <input type="text" placeholder=" " name="titulo" id="titulo">
                            <span class="omrs-input-label">Titulo</span>
                        </label>
                    </div>
                    <div class="omrs-input-group">
                        <label class="omrs-input-filled">
                            <input type="text" placeholder=" " name="descripcion" id="descripcion">
                            <span class="omrs-input-label">Descripción</span>
                        </label>
                    </div>
                    <div class="omrs-input-group">
                        <label class="omrs-input-filled">
                            <input type="date" placeholder=" " name="fecha" id="fecha">
                            <span class="omrs-input-label">Fecha</span>
                        </label>
                    </div>
                    <div class="omrs-input-group">
                        <label class="omrs-input-filled">
                            <input type="text" placeholder=" " name="pais" id="pais">
                            <span class="omrs-input-label">País</span>
                        </label>
                    </div>
                    <div class="omrs-input-group">
                        <label class="omrs-input-filled">
                            <input type="text" name="texalt" id="texalt">
                            <span class="omrs-input-label">Texto Alternativo</span>
                        </label>
                    </div>
                    <div class="omrs-input-group">
                        <label class="omrs-input-filled">
                            <p>Álbum</p>
                            <select name="album" id="album">
                                <?php
                                    if($resultado = $conexion->query("SELECT * FROM albumes")) {
                                        $id = $_GET["id"] ?? -1;
                                        if($id < 0) {
                                            echo '<option selected value="-1">-- Selecciona una opción --</option>';
                                        }
                                        while($fila = $resultado->fetch_assoc()) {
                                            $predeterminado = $fila["IdAlbum"] == $id ? 'selected' : '';
                                            echo '<option ' . $predeterminado . ' value="' . $fila["Titulo"] . '">' . $fila["Titulo"] . '</option>';
                                        }
                                        cerrarConexion($resultado, $conexion);
                                    }
                                ?>
                            </select>
                        </label>
                    </div>
                </section>
            </form>
        </div>
        <!-- TODO -->
        <!--Cambiar cuando haya tiempo-->
        <br><br>
    </main>
    <?php
        require_once "inc/footer.php";
    ?>
</body>
</html>
