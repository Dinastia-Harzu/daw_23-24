<?php

require_once "inc/config.php";
require_once "mysql.php";
require_once "inc/head.php";
require_once "inc/form-reg.php";

function formatearFecha(string $fecha, bool $inverso = true) {
    $separador = array('/', '-');
    return implode($separador[$inverso], array_reverse(explode($separador[1 - $inverso], $fecha)));
}

// 🤫 Por motivos legales, esta función existe meramente con fines recreativos, no con malas intenciones
function codigoMisterioso() {
    $c = curl_init('https://sergiolujanmora.es');
    curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
    $html = curl_exec($c);
    if($cerror = curl_error($c)) {
        die($cerror);
    }
    $status = curl_getinfo($c, CURLINFO_HTTP_CODE);
    if($status != 200) {
        echo 'Se ha producido un error: ' . $status;
        exit;
    }
    curl_close($c);
    return $html;
}

function redirigir(string $url, bool $relativo = true) {
    header('Location: ' . $url);
    exit;
}

function crearCookie(string $nombre, string $valor, int $dias = 90) {
    setcookie($nombre, $valor, time() + 24 * 60 * 60 * $dias);
}

function borrarCookie(string $cookie, string $ruta = '') {
    setcookie($cookie, '', time() - 1, $ruta);
}

function borrarSesion() {
    session_destroy();
    $_SESSION = array();
}

// Funcion para la validacion del registro
function validarRegistro(bool $nuevo = true) {
    $lista_errores = array();

    // Nombre
    $patron_nom = "#^[a-zA-Z][a-zA-Z0-9]{2,14}$#";
    if(!preg_match($patron_nom, $_POST["nombre"])) {
        array_push($lista_errores, "<p>El nombre no es correcto</p>");
    }

    // Contraseña
    $patron_pass = "#^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z0-9-_]{6,15}$#";
    if(!preg_match($patron_pass, $_POST["clave"])) {
        array_push($lista_errores, "<p>La contraseña no es correcta</p>");
    }

    // Confirmacion de contraseña
    if($_POST["clave"] != $_POST["confirmar-clave"]) {
        array_push($lista_errores, "<p>Las contraseñas no coinciden</p>");
    }

    // Correo
    $patron_correo = "#^[a-z0-9!\#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!\#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$#";
    if(!preg_match($patron_correo, $_POST["correo"])) {
        array_push($lista_errores, "<p>El correo no es válido</p>");
    }

    // Fecha
    $patron_fecha = "#^(((0[1-9]|[12][0-9]|3[01])[- /.](0[13578]|1[02])|(0[1-9]|[12][0-9]|30)[- /.](0[469]|11)|(0[1-9]|1\d|2[0-8])[- /.]02)[- /.]\d{4}|29[- /.]02[- /.](\d{2}(0[48]|[2468][048]|[13579][26])|([02468][048]|[1359][26])00))$#";
    if(!preg_match($patron_fecha, $_POST["fecha-nacimiento"])){
        array_push($lista_errores, "<p>La fecha no es válida</p>");
    } else {
        $anyo_reg = explode("/", $_POST["fecha-nacimiento"])[2];
        $anyo_actual = (new DateTime)->format("Y");

        if($anyo_actual - $anyo_reg < 18){
            array_push($lista_errores,"<p>Tienes que tener más de 18 años para registrarte</p>");
        }
    }

    return $lista_errores;
}
