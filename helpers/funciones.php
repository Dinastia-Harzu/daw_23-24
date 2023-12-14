<?php

require_once "inc/config.php";
require_once "mysql.php";
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
