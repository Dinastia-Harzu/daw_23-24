<?php

// Llamada al modelo
require_once "models/foto-model.php";
$foto = new Foto();

try {
    $resultado_foto_detalle = $foto->get_data("
    SELECT
        f.Titulo TituloFoto,
        DATE_FORMAT(f.FRegistro, '%e/%c/%Y') Fecha,
        Fichero,
        NomPais,
        f.Descripcion,
        IdAlbum,
        a.Titulo TituloAlbum,
        IdUsuario,
        u.NomUsuario
    FROM fotos f
    JOIN paises p ON(p.IdPais = f.Pais)
    JOIN albumes a ON(a.IdAlbum = f.Album)
    JOIN usuarios u ON(u.IdUsuario = a.Usuario)
    WHERE f.IdFoto = {$_GET["id"]}
;");
} catch(Exception $e) {
    header("Location: ./404.php");
    exit();
}

// Llamada a la vista
require_once "views/detalle-view.php";