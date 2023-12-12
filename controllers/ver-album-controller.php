<?php

// Llamada al modelo
require_once "models/foto-model.php";
$foto = new Foto();

try {
    $resultado_foto_veralbum = $foto->get_data("
    SELECT
        f.Titulo TituloFoto,
        f.Fichero,
        f.Alternativo,
        DATE_FORMAT(f.Fecha, '%e/%c/%Y') Fecha,
        a.Titulo TituloAlbum,
        a.Descripcion,
        p.NomPais
    FROM fotos f
    JOIN albumes a ON(f.Album = a.IdAlbum)
    JOIN paises p ON(f.Pais = p.IdPais)
    WHERE f.Album = {$_GET["id"]}
    ORDER BY f.Fecha ASC
;");
    $resultado_foto_paises_album = array();
    foreach($resultado_foto_veralbum as $fila){
        array_push($resultado_foto_paises_album, $fila["NomPais"]);
    }
    $resultado_foto_paises_album = array_unique($resultado_foto_paises_album);
    
} catch(Exception $e) {
    header("Location: ./404.php");
    exit();
}

// Llamada a la vista
require_once "views/ver-album-view.php";