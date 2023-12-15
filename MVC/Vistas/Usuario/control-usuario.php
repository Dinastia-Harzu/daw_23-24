<?php

if(isset($_POST["cerrar-sesion"])) {
    borrarSesion();
    borrarCookie('recuerdame');
    borrarCookie('ultima-vez');
    redirigir('index.php');
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

$nombre = $_POST["nombre"] ?? false;
$clave = $_POST["clave"] ?? false;
$pagina = 'index.php';
if($nombre && $clave) {
    $conexion = abrirConexion();
    $resultado = $conexion->query("
        SELECT *
        FROM usuarios
        WHERE NomUsuario = '$nombre'
        AND Clave = '$clave'
    ;");
    if($resultado && $resultado->num_rows) {
        $pagina = 'usuario.php';
        $_SESSION["usuario"] = $nombre;
    }
    if(isset($usuarios[$nombre]) && array_search($clave, $usuarios, true)) {
        $pagina = 'usuario.php';
        $_SESSION["usuario"] = $nombre;
        if(isset($_POST["recuerdame"])) {
            crearCookie('recuerdame', $nombre . '.' . $clave);
            crearCookie('ultima-vez', time());
        }
        if(isset($_COOKIE["ultima-vez"])) {
            crearCookie('ultima-vez', time());
        }
    }
}
header("Location: $pagina");
