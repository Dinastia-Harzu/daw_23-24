<?php

// Llamada al modelo
require_once "models/usuario-model.php";
$usuario = new Usuario();

try {
    session_start();

    $resultado_usuario = $usuario->get_data("
    SELECT 
        u.*, 
        NomPais
    FROM usuarios u
    JOIN paises ON(IdPais = Pais)
    WHERE NomUsuario = '{$_SESSION["usuario"]}'
;");
} catch(Exception $e) {
    header("Location: ./404.php");
    exit();
}

// Llamada a la vista
require_once "views/usuario-view.php";