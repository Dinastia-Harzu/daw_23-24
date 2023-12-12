<?php

// Llamada al modelo
require_once "models/album-model.php";
$album = new Album();

try {
    $resultado_album_publicar = $album->get_data("
    SELECT *
    FROM albumes
    WHERE Usuario = {$_GET["id"]}
;");
} catch(Exception $e) {
    header("Location: ./404.php");
    exit();
}

// Llamada a la vista
require_once "views/publicar-view.php";

?>