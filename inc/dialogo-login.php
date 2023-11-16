<dialog id="login" open="">
    <p class="titulo-dialog">Iniciar sesión</p>
    <form action="control-usuario.php" method="post">
        <div class="omrs-input-group">
            <label class="omrs-input-filled">
                <input type="text" placeholder=" " id="nombre" name="nombre">
                <span class="omrs-input-label">Introduce tu nombre de usuario</span>
            </label>
        </div>
        <div class="omrs-input-group">
            <label class="omrs-input-filled">
                <input type="password" placeholder=" " id="contraseña" name="contraseña">
                <span class="omrs-input-label">Introduce tu contraseña</span>
            </label>
        </div>
        <?php
            if(!isset($_COOKIE["recuerdame"])) {
                echo <<<hereDOC
                    <div class="omrs-input-group">
                        <label class="omrs-input-filled">
                            <input type="checkbox" id="recuerdame" name="recuerdame">
                            <span class="omrs-input-label">Recuérdame</span>
                        </label>
                    </div>
                hereDOC;
            }
        ?>
        <div class="campo-boton-submit">
            <button type="submit">Enviar</button>
        </div>
        <hr>
        <p class="text-google">...o continúa con Google</p>
        <a href="https://accounts.google.com" class="google-login">
            <img src="img/google.svg" alt="Icono de Google">
            <p>Inicia sesión con Google</p>
        </a>
        <hr>
        <p class="text-google">¿No tienes cuenta? <a href="registro.php">Regístrate</a>
        </p>
    </form>
    <p class="enlace-simple">
        <a href="#">Volver</a>
    </p>
</dialog>
