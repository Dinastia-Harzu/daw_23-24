<?php

// Llamada al modelo
require_once "models/pais-model.php";
$pais = new Pais();

try {
    $resultado_pais = $pais->get_data("
    SELECT *
    FROM paises
;");
} catch(Exception $e) {
    header("Location: ./404.php");
    exit();
}

// Llamada a la vista
require_once "views/registro-view.php";

?>