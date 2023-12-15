<?php

// Llamada al modelo
require_once "models/usuario-model.php";
$usuario = new Usuario();

try {
    $resultado_usuario_clave = $usuario->get_data("
        SELECT 
            Clave
        FROM usuarios
        WHERE IdUsuario = {$_GET["id"]}
    ;");
} catch(Exception $e) {
    echo $e;
    exit();
}

// Llamada a la vista
require_once "views/respuesta-eliminacion-view.php";