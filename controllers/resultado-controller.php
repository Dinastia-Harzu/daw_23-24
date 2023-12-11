<?php

// Llamada al modelo
require_once "models/foto-model.php";
$foto = new Foto();

try {
    list($titulo, $desde, $hasta, $pais) = array(
        $_POST["titulo"] ?? "",
        $_POST["fecha-desde"] ?? "",
        $_POST["fecha-hasta"] ?? "",
        $_POST["pais"] ?? -1
    );
    $sql = "
        SELECT f.*, a.Titulo TituloAlbum, a.Descripcion DescripcionAlbum, NomPais
        FROM fotos f
        JOIN albumes a ON(Album = IdAlbum)
        JOIN paises p ON(Pais = IdPais)
        WHERE 1 = 1
    ";
    if($titulo != "") {
        $sql .= "AND f.Titulo = LOWER('$titulo')";
    }
    if($desde != "") {
        $sql .= "AND Fecha >= '$desde'";
    }
    if($hasta != "") {
        $sql .= "AND Fecha <= '$hasta'";
    }
    if($pais > -1) {
        $sql .= "AND Pais = $pais";
    }
    $sql .= ";";

    // Hacemos la peticion
    $resultado_foto_busqueda = $foto->get_data($sql);
} catch(Exception $e) {
    header("Location: ./404.php");
    exit();
}

// Llamada a la vista
require_once "views/resultado-view.php";