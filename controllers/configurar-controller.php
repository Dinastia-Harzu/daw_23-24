<?php

// Llamada al modelo
require_once "models/estilo-model.php";
$estilo = new Estilo();

try {
    $resultado_estilo = $estilo->get_data("
    SELECT *
    FROM estilos
;");
} catch(Exception $e) {
    header("Location: ./404.php");
    exit();
}

// Llamada a la vista
require_once "views/configurar-view.php";

?>