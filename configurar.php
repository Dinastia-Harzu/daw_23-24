<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configurar estilos - Masthermatika</title>
    <link rel="stylesheet" href="css/global/style.css">
    <link rel="stylesheet" href="css/ordenador/style.css">
    <link rel="stylesheet" href="css/tablet/style.css">
    <link rel="stylesheet" href="css/movil/style.css">
    <link rel="stylesheet" href="css/global/respuesta_usuario.css">
    <link rel="stylesheet" href="css/ordenador/respuesta_usuario.css">
    <link rel="stylesheet" href="css/tablet/respuesta_usuario.css">
    <link rel="stylesheet" href="css/movil/respuesta_usuario.css">

</head>

<?php

    include_once "inc/header.php";

    // Consulta para obtener los datos
    $id = mysqli_connect("","root","","daw");
    if(mysqli_connect_errno()) {
        echo mysqli_connect_error();
        exit();
    }

    $result = mysqli_query($id, "
        SELECT * 
        FROM estilos
    ");

    echo <<<hereDOC
        <body>
        <main>
            <h2>Elige el estilo de la página</h2>
            <div id ="datos-usuario">
    hereDOC;
    
    while($row = mysqli_fetch_assoc($result)) {
        echo <<<hereDOC
            <p>{$row["Descripcion"]}</p>
        hereDOC;
    }

    echo <<<hereDOC
        </div>
    </main>
    </body>
    hereDOC;

    include_once "inc/footer.php";

?>
</html>