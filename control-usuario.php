<?php

// Si el usuario ha llegado a esta página a través de cerrar sesión, lo hacemos y redirigimos
if(isset($_POST["cerrar-sesion"])){
    session_start();
    session_destroy();
    $_SESSION = array();
    setcookie("recuerdame", "", time() - 1);
    setcookie("ultima-vez", "", time() - 1);
    header('Location: index.no_registrado.php');
    exit;
}

$usuarios = array(
    'ADMIN' => 'ADMIN123',
    'DEBUG' => 'DEBUG',
    'agrg11' => 'clavesecreta',
    'mgv' => 'password',
    'TONC' => 'GBA',
    'sergiolujanmora' => 'accesibilidad'
);
$temas = array(
    'ADMIN' => 'letra-mayor',
    'DEBUG' => 'alto-contraste',
    'agrg11' => 'oscuro',
    'mgv' => 'claro',
    'TONC' => 'letra-mayor-y-alto-contraste'
);
$protocolo = 'http://';
$host = 'localhost';
$uri = 'daw_23-24';

if(isset($_POST["nombre"]) && isset($_POST["clave"])) {
    $nombre = $_POST["nombre"];
    $clave = $_POST["clave"];
    if(isset($usuarios[$nombre]) && array_search($clave, $usuarios, true)) {
        $pagina = 'usuario.php';
        session_start();
        $_SESSION["usuario"] = $nombre;
        $_SESSION["tema"] = $temas[$nombre];
        if(isset($_POST["recuerdame"])) {
            setcookie("recuerdame", $nombre . "." . $clave, time() + 24 * 60 * 60 * 90);
            setcookie("ultima-vez", time(), 2 * time());
        }
        if(isset($_COOKIE["ultima-vez"])) {
            setcookie("ultima-vez", time(), 2 * time());
        }
    } else {
        $pagina = 'index.no_registrado.php';
    }
} else {
    $pagina = 'index.no_registrado.php';
}
header("Location: $protocolo$host/$uri/$pagina");
