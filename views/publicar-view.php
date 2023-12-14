<?php
    require_once "helpers/funciones.php";
    session_start();

    generarHead('publicar');
?>
<body>
    <?php
        require_once "inc/header.php";
    ?>
    <main>
        <div id="creacion-cuenta">
            <h1>Añadir foto</h1>
            <form action="respuesta-publicar.php" method="post" id="tab-reg">
                <section id="reg-1">
                    <h2>Introduce la información de la foto:</h2>
                    <div class="omrs-input-group">
                        <label class="omrs-input-filled">
                            <input type="text" placeholder=" " name="titulo" id="titulo" required>
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
                        <p>País</p>
                        <label class="omrs-input-filled">
                            <select name="pais" id="pais">
                                <?php
                                foreach ($resultado_pais_publicar as $fila) {
                                    echo '<option value="' . $fila["IdPais"] . '">' . $fila["NomPais"] . '</option>';
                                }
                                ?>
                            </select>
                        </label>
                    </div>
                    <div class="omrs-input-group">
                        <label class="omrs-input-filled">
                            <input type="text" name="texalt" id="texalt" pattern="^(?!foto|imagen).{10,}$">
                            <span class="omrs-input-label">Texto Alternativo</span>
                        </label>
                    </div>
                    <div class="omrs-input-group">
                        <label class="omrs-input-filled">
                            <p>Álbum</p>
                            <select name="album" id="album">
                                <?php
                                    $id = $_GET["id"] ?? -1;
                                    if($id < 0) {
                                        echo '<option selected value="-1">-- Selecciona una opción --</option>';
                                    }
                                    foreach($resultado_album_publicar as $fila) {
                                        $predeterminado = $fila["IdAlbum"] == $id ? 'selected' : '';
                                        echo '<option ' . $predeterminado . ' value="' . $fila["IdAlbum"] . '">' . $fila["Titulo"] . '</option>';
                                    }
                                ?>
                            </select>
                        </label>
                    </div>
                </section>
                <div class="campo-boton-submit">
                    <button type="submit" id="btn-registro">Enviar</button>
                </div>
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
