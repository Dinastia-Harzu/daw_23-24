<?php
    session_start();
    if(!isset($_SESSION["usuario"])) {
        header("Location: index.no_registrado.php");
    }
    $tema = isset($_SESSION["tema"]) ? $_SESSION["tema"] : "oscuro";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Título imagen - Masthermatika</title>
    <link rel="stylesheet" href="css/global/style.css">
    <link rel="stylesheet" href="css/ordenador/style.css">
    <link rel="stylesheet" href="css/tablet/style.css">
    <link rel="stylesheet" href="css/movil/style.css">
    <link rel="stylesheet" href="css/global/detalle.css">
    <link rel="stylesheet" href="css/ordenador/detalle.css">
    <link rel="stylesheet" href="css/tablet/detalle.css">
    <link rel="stylesheet" href="css/movil/detalle.css">
    <link rel="alternate stylesheet" href="css/modos-alternativos/oscuro.css" title="Modo oscuro (predeterminado)">
    <link rel="alternate stylesheet" href="css/modos-alternativos/claro.css" title="Modo claro">
    <link rel="alternate stylesheet" href="css/modos-alternativos/alto-contraste.css" title="Modo de alto contraste">
    <link rel="alternate stylesheet" href="css/modos-alternativos/letra-mayor.css" title="Modo de tipo de letra mayor">
    <link rel="alternate stylesheet" href="css/modos-alternativos/letra-mayor-y-alto-contraste.css" title="Modo de letra mayor y alto contraste">
    <link rel="stylesheet" href="css/impresion/style.css" media="print">
    <link rel="stylesheet" href="css/impresion/detalle.css" media="print">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php
    include_once "inc/header-no-registrado.php";

    // Select para obtener variables
    $id = mysqli_connect("","root","","daw");
    if(mysqli_connect_errno()) {
        echo mysqli_connect_error();
        exit();
    }

    $result = mysqli_query($id,"
        SELECT 
            f.Titulo AS TituloFoto,
            DATE_FORMAT(f.FRegistro,'%e/%c/%Y') as Fecha,
            Fichero,
            NomPais,
            f.Descripcion,
            a.IdAlbum,
            a.Titulo AS TituloAlbum
        FROM fotos f
        JOIN paises p ON(p.IdPais = f.Pais)
        JOIN albumes a ON(a.IdAlbum = f.Album);
    ");
    
?>
    <main>
<?php
        while($row = mysqli_fetch_array($result)) {
            echo <<<hereDOC
                <section id="foto">
                    <img src="{$row["Fichero"]}" alt="Foto matemática">
                    <section id="info-foto">
                        <h1>{$row["TituloFoto"]}</h1>
                        <p>Publicado en <time>{$row["Fecha"]}</time></p>
                        <p>{$row["NomPais"]}</p>
                        <p>{$row["Descripcion"]}</p>
                        <p><a href="ver-album.php?id={$row["IdAlbum"]}">{$row["TituloAlbum"]}</a></p>
                    </section>
                </section>
            hereDOC;
        }
?>
    </main>
<?php
    include_once "inc/footer.php";
?>
</body>
</html>