<?php

// Llamada al modelo
require_once "models/foto-model.php";
require_once "models/pais-model.php";
$foto = new Foto();
$pais = new Pais();

try {
    $foto->insert_data("
    INSERT INTO fotos
        VALUES (
            NULL,
            '{$_POST["titulo"]}',
            '{$_POST["descripcion"]}',
            '{$_POST["fecha"]}',
            {$_POST["pais"]},
            {$_POST["album"]},
            'img/foto4.png',
            '{$_POST["texalt"]}',
            DATE_FORMAT(CURDATE(), '%Y-%m-%d')
         )
    ;");
    
    // Obtenemos pais bien
    $nombre_pais_publicar = $pais->get_data("
    SELECT 
        NomPais
    FROM paises
    WHERE IdPais = {$_POST["pais"]}
    ;");

    // Obtenemos fecha bien
    $fechaObjeto = new DateTime($_POST["fecha"]);
    $fechaFormateada = $fechaObjeto->format('d/m/Y');
    
} catch(Exception $e) {
    echo $e;
}

// Llamada a la vista
require_once "views/respuesta-publicar-view.php";

?>