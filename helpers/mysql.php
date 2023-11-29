<?php

function abrirConexion(string $host = null, string $usuario = "root", string $clave = "", string $bd = "daw") {
    $mysql = new mysqli($host, $usuario, $clave, $bd);
    if($errno = $mysql->connect_errno) {
        echo '(ERROR ' . $errno . '): No se pudo conectar a la base de datos: ' . $mysql->connect_error;
        exit;
    }
    return $mysql;
}
