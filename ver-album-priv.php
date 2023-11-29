<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver álbum -  Masthermatika</title>
    <link rel="stylesheet" href="css/global/style.css">
    <link rel="stylesheet" href="css/ordenador/style.css">
    <link rel="stylesheet" href="css/tablet/style.css">
    <link rel="stylesheet" href="css/movil/style.css">
    <link rel="stylesheet" href="css/global/detalle.css">
    <link rel="stylesheet" href="css/ordenador/detalle.css">
    <link rel="stylesheet" href="css/tablet/detalle.css">
    <link rel="stylesheet" href="css/movil/detalle.css">
</head>
<?php
    include_once "inc/header.php";

    // Consulta select para obtener los datos
    $id = mysqli_connect("","root","","daw");
    if(mysqli_connect_errno()) {
        echo mysqli_connect_error();
        exit();
    }

    $result = mysqli_query($id, "
        SELECT 
            f.Titulo as TituloFoto,
            f.Fichero,
            f.Alternativo,
            DATE_FORMAT(f.Fecha ,'%e/%c/%Y') as Fecha,
            a.IdAlbum,
            a.Titulo as TituloAlbum,
            a.Descripcion
        FROM `fotos` f
        JOIN `albumes` a ON(f.Album = a.IdAlbum)
        WHERE f.Album = {$_GET["id"]}
        ORDER BY f.Fecha ASC;
    ");

    $result_paises = mysqli_query($id,"
        SELECT DISTINCT 
            p.NomPais 
        FROM `fotos` f
        JOIN `albumes`a
        ON(f.Album = a.IdAlbum)
        JOIN paises p ON(f.Pais = p.IdPais)
        WHERE f.Album = {$_GET["id"]};
    ");

    $first_row = mysqli_fetch_array($result);

    // Obtenemos la longitud de la query (que son la cantidad de fotos hechas)
    if ($result instanceof mysqli_result) {
        $longitud = mysqli_num_rows($result);
    }

    echo <<<hereDOC
        <section id="foto">
            <section>
            <h2>Fotografías del álbum</h2>
    hereDOC;

    mysqli_data_seek($result, 0);
    while($row = mysqli_fetch_assoc($result)) {
        echo <<<hereDOC
            <p><img src="{$row["Fichero"]}" alt="{$row["Alternativo"]}"></p>
        hereDOC;
    }

    echo <<<hereDOC
            </section>
            <section id="info-foto">
                <h1>Información del álbum - {$first_row["TituloAlbum"]}</h1>
                <p>{$first_row["Descripcion"]}</p>
                <p>Nº de fotografías del álbum: $longitud</p>
                <p>Paises donde se tomaron fotografías:</p>
                <ul class="lista-info-album">
    hereDOC;
    
    while($row = mysqli_fetch_assoc($result_paises)) {
        echo "<li>{$row["NomPais"]}</li>";
    }

    mysqli_data_seek($result, $longitud - 1);
    $last_row = mysqli_fetch_array($result);
    echo <<<hereDOC
        </ul>
        <p>Fecha de la primera foto: {$first_row["Fecha"]}</p>
        <p>Fecha de la última foto: {$last_row["Fecha"]}</p>
        <hr>
        <p><a href="publicar.php?id={$last_row["IdAlbum"]}">Añadir foto a álbum</a></p>
            </section>
        </section>
    hereDOC;

    include_once "inc/footer.php";
?>
</html>