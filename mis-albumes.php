<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis albumes - Masthermatika</title>
    <link rel="stylesheet" href="css/global/style.css">
    <link rel="stylesheet" href="css/ordenador/style.css">
    <link rel="stylesheet" href="css/tablet/style.css">
    <link rel="stylesheet" href="css/movil/style.css">
    <link rel="stylesheet" href="css/global/respuesta_usuario.css">
    <link rel="stylesheet" href="css/ordenador/respuesta_usuario.css">
    <link rel="stylesheet" href="css/tablet/respuesta_usuario.css">
    <link rel="stylesheet" href="css/movil/respuesta_usuario.css">
</head>
<body>
    <main>
    <?php
        include_once "inc/header.php";

        //Consulta para obtener datos
        $id = mysqli_connect("","root","","daw");
        if(mysqli_connect_errno()) {
            echo mysqli_connect_error();
            exit();
        }

        $result = mysqli_query($id, "
            SELECT * 
            FROM albumes 
            WHERE Usuario = {$_GET["id"]}");

        echo <<<hereDOC
            <h2>Mis álbumes</h2>
            <div id= "datos-usuario">
        hereDOC;

        while($row = mysqli_fetch_array($result)) {
            echo <<<hereDOC
            <h3>{$row["Titulo"]}</h3>
            <p>{$row["Descripcion"]}</p>
            <hr>
        hereDOC;
        }
        echo '<p><a href = "mis-fotos.php">Ver todas las fotos</a></p>';
        echo "</div>";
        

        include_once "inc/footer.php";
    ?>
    </main>
</body>
</html>