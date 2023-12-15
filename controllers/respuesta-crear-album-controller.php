<?php

// Llamada al modelo
require_once "models/album-model.php";
$album = new Album();

try {
    $album->insert_data("
    INSERT INTO albumes
        VALUES (
            NULL,
            '{$_POST["titulo"]}',
            '{$_POST["descripcion"]}',
            '{$_GET["id"]}'
         )
    ;"); 
} catch(Exception $e) {
    echo $e;
    exit();
}

// Llamada a la vista
require_once "views/respuesta-crear-album-view.php";

?>