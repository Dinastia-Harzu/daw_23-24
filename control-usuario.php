<?php

// Si el usuario ha llegado a esta página a través de cerrar sesión, lo hacemos y redirigimos
if(isset($_POST["cerrar-sesion"])){
    session_start();
    session_destroy();
    $_SESSION = array();
    header('Location: index.no_registrado.php');
}

$usuarios = array(
    'ADMIN' => 'ADMIN123',
    'DEBUG' => 'DEBUG',
    'agrg11' => 'clavesecreta',
    'mgv' => 'password'
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
        setcookie("recuerdame", $nombre . "¬" . $contraseña, time() + 24 * 60 * 60 * 90);
        echo $_COOKIE["recuerdame"];
    }
} else {
    $pagina = 'index.no_registrado.php';
}
header("Location: $protocolo$host/$uri/$pagina");

?>
