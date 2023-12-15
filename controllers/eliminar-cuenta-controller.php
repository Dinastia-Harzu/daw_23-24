<?php

// Llamada al modelo
require_once "models/foto-model.php";
$foto = new Foto();

try {
    $resultado_foto_eliminar = $foto->get_data("
    SELECT 
        COUNT(f.IdFoto) as NumFotos, 
        a.IdAlbum, 
        a.Titulo
    FROM fotos f 
    JOIN albumes a ON(f.Album = a.IdAlbum AND a.Usuario = {$_GET["id"]}) 
    GROUP BY a.IdAlbum, a.Titulo
;");
} catch(Exception $e) {
    echo $e;
}

// Llamada a la vista
require_once "views/eliminar-cuenta-view.php";