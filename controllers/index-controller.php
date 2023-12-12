<?php

// Llamada al modelo
require_once "models/foto-model.php";
$foto = new Foto();

try {
    $resultado_foto = $foto->get_data("
    SELECT
        IdFoto,
        f.Titulo,
        DATE_FORMAT(FRegistro,'%e/%c/%Y') as Fecha,
        Fichero,
        Pais,
        Alternativo,
        NomPais
    FROM fotos f
    JOIN paises p ON(f.Pais = p.IdPais)
;");
} catch(Exception $e) {
    header("Location: ./404.php");
    exit();
}

// Llamada a la vista
require_once "views/index-view.php";