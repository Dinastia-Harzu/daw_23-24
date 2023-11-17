<?php

// Si el usuario ha llegado a esta página a través de cerrar sesión, lo hacemos y redirigimos
if(isset($_POST["cerrar-sesion"])){
    session_start();
    session_destroy();
    $_SESSION = array();
    header('Location: solicitar_album.php');
}

$usuarios = array(
    'ADMIN' => 'ADMIN123',
    'DEBUG' => 'DEBUG',
    'agrg11' => 'clavesecreta',
    'mgv' => 'password',
    'TONC' => 'GBA'
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

if(isset($_POST["nombre"]) && isset($_POST["contraseña"])) {
    $nombre = $_POST["nombre"];
    $contraseña = $_POST["contraseña"];
    if(isset($usuarios[$nombre]) && array_search($contraseña, $usuarios, true)) {
        $pagina = 'usuario.php';
    } else {
        $pagina = 'index.no_registrado.php';
    }
    if(isset($_POST["recuerdame"])) {
        setcookie("recuerdame", $nombre . "." . $contraseña, time() + 24 * 60 * 60 * 90);
        setcookie("ultima-vez", time(), 2 * time());
    }
    if(isset($_COOKIE["ultima-vez"])) {
        setcookie("ultima-vez", time(), 2 * time());
    }
    session_start();
    $_SESSION["usuario"] = $nombre;
    $_SESSION["tema"] = $temas[$nombre];
} else {
    $pagina = 'index.no_registrado.php';
}
header("Location: $protocolo$host/$uri/$pagina");

?>
