<?php

// Llamada al modelo
require_once "models/foto-model.php";
$foto = new Foto();

try {
    $resultado_foto_misfotos = $foto->get_data("
    SELECT
        f.Titulo TituloFoto,
        DATE_FORMAT(f.FRegistro, '%e/%c/%Y') Fecha,
        f.Descripcion,
        f.Alternativo,
        Fichero,
        NomPais,
        a.IdAlbum,
        a.Titulo TituloAlbum
    FROM fotos f
    JOIN paises p ON(p.IdPais = f.Pais)
    JOIN albumes a ON(a.IdAlbum = f.Album)
;");
} catch(Exception $e) {
    header("Location: ./404.php");
    exit();
}

// Llamada a la vista
require_once "views/mis-fotos-view.php";