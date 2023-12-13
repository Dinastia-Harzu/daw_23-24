<?php

function generarFormularioRegistro(
    int $id = 0,
    string $nombre = '',
    string $clave = '',
    string $correo = '',
    string $fecha = '',
    string $ciudad = '',
    string $pfp = 'img/placeholder_grande.png',
    int $pais = -1,
    array $resultado_pais = array(),
    bool $nuevo = true
) {
    if($nuevo) {
        echo <<<hereDOC
                <form action="respuesta-usuario.php" method="post" id="tab-reg">
            hereDOC;
    } else {
        echo <<<hereDOC
            <form action="respuesta-usuario.php?id=$id" method="post" id="tab-reg">
        hereDOC;
    }
        echo <<<hereDOC
            <section id="reg-1">
                <h2>Introduce tus datos personales:</h2>
                <div class="omrs-input-group">
                    <label class="omrs-input-filled">
                        <input type="text" placeholder=" " name="nombre" id="nombre" value="$nombre">
                        <span class="omrs-input-label">Nombre</span>
                    </label>
                </div>
                <div class="omrs-input-group">
                    <label class="omrs-input-filled">
                        <input type="text" placeholder=" " name="clave" id="clave" value="$clave">
                        <span class="omrs-input-label">Contraseña</span>
                    </label>
                </div>
    hereDOC;
            if($nuevo) {
                echo <<<hereDOC
                    <div class="omrs-input-group">
                        <label class="omrs-input-filled">
                            <input type="text" placeholder=" " name="confirmar-clave" id="confirmar-clave">
                            <span class="omrs-input-label">Confirmar contraseña</span>
                        </label>
                    </div>
                hereDOC;
            } else {
                echo <<<hereDOC
                    <div class="omrs-input-group">
                        <label class="omrs-input-filled">
                            <input type="text" placeholder=" " name="nueva-clave" id="nueva-clave">
                            <span class="omrs-input-label">Nueva contraseña</span>
                        </label>
                    </div>
                hereDOC;
            }
            echo <<<hereDOC
                <div class="omrs-input-group">
                    <label class="omrs-input-filled">
                        <input type="text" placeholder=" " name="correo" id="correo" value="$correo">
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
            hereDOC;
            // Formateamos la fecha
            if($fecha != '') {
                $fechaObjeto = new DateTime($fecha);
                $fechaFormateada = $fechaObjeto->format('d/m/Y');
            } else {
                $fechaFormateada = '';
            }
            echo <<<hereDOC
                <div class="omrs-input-group">
                    <label class="omrs-input-filled">
                    <input type="text" name="fecha-nacimiento" id="fecha-nacimiento" value="$fechaFormateada">
                        <span class="omrs-input-label">Fecha de nacimiento</span>
                    </label>
                </div>
                <div class="omrs-input-group">
                    <label class="omrs-input-filled">
                        <input type="text" placeholder=" " name="ciudad" id="ciudad" value="$ciudad">
                        <span class="omrs-input-label">Ciudad</span>
                    </label>
                </div>
                <div class="omrs-input-group">
                    <label class="omrs-input-filled">
                        <p>País</p>
                        <select name="pais" id="pais">
                            <option disabled value>-- Selecciona una opción --</option>
            hereDOC;
    foreach($resultado_pais as $fila) {
        $predeterminado = $pais == $fila["IdPais"] ? 'selected' : '';
        echo '<option ' . $predeterminado . ' value="' . $fila["IdPais"] . '">' . $fila["NomPais"] . '</option>';
    }
    echo <<<hereDOC
                        </select>
                    </label>
                </div>
            </section>
            <section id="reg-2">
                <h3>Introduce tu foto de perfil:</h3>
                <div>
                    <label for="pfp">
                        <img src="$pfp" alt="Foto de perfil">
                    </label>
                    <div id="pfp-query">
                        <label for="pfp"><i class="fa fa-folder acciones-fichero"></i></label>
                        <label><i class="fa fa-remove acciones-fichero"></i></label>
                        <input type="file" name="pfp" id="pfp" accept="image/*">
                    </div>
                </div>
            </section>
            <div class="campo-boton-submit">
                <button type="submit" id="btn-registro">Enviar</button>
            </div>
        </form>
    hereDOC;
}
