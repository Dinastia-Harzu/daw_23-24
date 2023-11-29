<form action="respuesta_usuario.php" method="post" id="tab-reg">
    <section id="reg-1">
        <h2>Introduce tus datos para registarte:</h2>
        <div class="omrs-input-group">
            <label class="omrs-input-filled">
                <?php
                echo '<input type="text" placeholder=" " name="nombre" id="nombre" value=' . $nombre . '>';
                ?>
                <span class="omrs-input-label">Nombre</span>
            </label>
        </div>
        <div class="omrs-input-group">
            <label class="omrs-input-filled">
                <?php
                echo '<input type="text" placeholder=" " name="contraseña" id="contraseña" value=' . $contraseña . '>';
                ?>
                <span class="omrs-input-label">Contraseña</span>
            </label>
        </div>
        <div class="omrs-input-group">
            <label class="omrs-input-filled">
                <input type="text" placeholder=" " name="confirmar-contraseña" id="confirmar-contraseña">
                <span class="omrs-input-label">Confirmar contraseña</span>
            </label>
        </div>
        <div class="omrs-input-group">
            <label class="omrs-input-filled">
                <?php
                echo '<input type="text" placeholder=" " name="correo" id="correo" value=' . $correo . '>';
                ?>
                <span class="omrs-input-label">Correo electrónico</span>
            </label>
        </div>
        <div class="omrs-input-group">
            <label class="omrs-input-filled">
                <p>Sexo</p>
                <select name="sexo" id="sexo">
                    <option value="Prefiero no decirlo">Prefiero no decirlo</option>
                    <option value="Hombre">Hombre</option>
                    <option value="Mujer">Mujer</option>
                </select>
            </label>
        </div>
        <div class="omrs-input-group">
            <label class="omrs-input-filled">
                <?php
                echo '<input type="text" name="fecha-nacimiento" id="fecha-nacimiento" value= ' . $fecha_nac . '>';
                ?>
                <span class="omrs-input-label">Fecha de nacimiento</span>
            </label>
        </div>
        <div class="omrs-input-group">
            <label class="omrs-input-filled">
                <?php
                echo '<input type="text" placeholder=" " name="ciudad" id="ciudad" value= ' . $ciudad . '>';
                ?>
                <span class="omrs-input-label">Ciudad</span>
            </label>
        </div>
        <div class="omrs-input-group">
            <label class="omrs-input-filled">
                <p>País</p>
                <select name="pais" id="pais">
                    <option disabled value>-- Selecciona una opción --</option>
                    <?php
                        while($row = mysqli_fetch_array($result)) {
                            if($pais == $row["IdPais"]){
                                echo <<<hereDOC
                                    <option selected value = "{$row["IdPais"]}">{$row["NomPais"]}</option>
                                hereDOC;
                            }

                            else{
                                echo <<<hereDOC
                                    <option value = "{$row["IdPais"]}">{$row["NomPais"]}</option>
                                hereDOC;
                            }
                        }
                    ?>
                </select>
            </label>
        </div>
    </section>
    <section id="reg-2">
        <h3>Introduce tu foto de perfil:</h3>
        <div>
            <label for="pfp">
                <?php
                echo '<img src=' . $pfp . ' alt="Foto de perfil">'
                ?>
            </label>
            <div id="pfp-query">
                <label for="pfp"><i class="fa fa-folder acciones-fichero"></i></label>
                <label><i class="fa fa-remove acciones-fichero"></i></label>
                <input type="file" name="pfp" id="pfp" accept="image/*">
            </div>
        </div>
    </section>
    <div class="campo-boton-submit">
        <?php
        echo '<button type="submit" id="btn-registro">' . $texto_submit . '</button>'
        ?>
    </div>
</form>