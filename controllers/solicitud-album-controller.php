<?php

// Llamada al modelo
require_once "models/album-model.php";
require_once "helpers/funciones.php";
$album = new Album();

try {
    $resultado_album_solicitud = $album->get_data("
    SELECT *
    FROM albumes
;");
} catch(Exception $e) {
    header("Location: ./404.php");
    exit();
}

// Llamada a la vista
require_once "views/solicitud-album-view.php";

?>