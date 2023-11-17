<?php

list($nombre, $contraseña) = explode(".", $_COOKIE["recuerdame"]);
$fechahora = $_COOKIE["ultima-vez"];
$fecha = date("n.j.Y", $fechahora);
$hora = date("H:i", $fechahora);

echo <<<hereDOC
    <dialog id="login" open="">
        <h2>Hola, $nombre.</h2>
        <p>Tu última visita fue el $fecha a las $hora.</p>
        <form action="control-usuario.php" method="post">
            <div class="campo-boton-submit">
                <input type="hidden" name="nombre" value="$nombre">
                <input type="hidden" name="contraseña" value="$contraseña">
                <button type="submit">Entrar</button>
            </div>
        </form>
        <p class="enlace-simple">
            <a href="#">Volver</a>
        </p>
    </dialog>
hereDOC;

?>
