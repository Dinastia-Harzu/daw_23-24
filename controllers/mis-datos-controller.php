<?php

// Llamada al modelo
require_once "models/usuario-model.php";
require_once "models/pais-model.php";
$usuario = new Usuario();
$pais = new Pais();

try {
    $resultado_usuario_misdatos = $usuario->get_data("
    SELECT
        IdUsuario,
        NomUsuario,
        Clave,
        Email,
        Sexo,
        FNacimiento,
        Ciudad,
        Pais,
        Foto
    FROM usuarios
    WHERE IdUsuario = {$_GET["id"]}
;");

    $resultado_pais_misdatos = $pais->get_data("
    SELECT * 
    FROM paises
;");

} catch(Exception $e) {
    header("Location: ./404.php");
    exit();
}

// Llamada a la vista
require_once "views/mis-datos-view.php";