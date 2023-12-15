<?php

// Llamada al modelo
require_once "models/album-model.php";
$album = new Album();

try {
    $resultado_album_perfil = $album->get_data("
    SELECT
        u.NomUsuario,
        u.Foto,
        u.FRegistro,
        a.IdAlbum,
        a.Titulo,
        a.Descripcion
    FROM albumes a
    JOIN usuarios u ON(a.Usuario = u.IdUsuario)
    WHERE u.IdUsuario = {$_GET["id"]}
;");
} catch(Exception $e) {
    header("Location: ./404.php");
    exit();
}

// Llamada a la vista
require_once "views/perfil-usuario-view.php";

?>