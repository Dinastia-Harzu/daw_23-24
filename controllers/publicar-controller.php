<?php

// Llamada al modelo
require_once "models/album-model.php";
require_once "models/pais-model.php";
$album = new Album();
$pais = new Pais();

try {
    $resultado_album_publicar = $album->get_data("
    SELECT *
    FROM albumes
    WHERE Usuario = {$_GET["id"]}
;");
    $resultado_pais_publicar = $pais->get_data("
    SELECT *
    FROM paises
    ;");
} catch(Exception $e) {
    header("Location: ./404.php");
    exit();
}

// Llamada a la vista
require_once "views/publicar-view.php";

?>