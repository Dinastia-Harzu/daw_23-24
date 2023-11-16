<?php

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
        setcookie("recuerdame", $_POST["nombre"] . "¬" . $_POST["contraseña"], time() + 24 * 60 * 60 * 90);
        echo $_COOKIE["recuerdame"];
    }
} else {
    $pagina = 'index.no_registrado.php';
}
header("Location: $protocolo$host/$uri/$pagina");

?>
