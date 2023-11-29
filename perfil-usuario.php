<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil usuario - Masthermatika</title>
    <link rel="stylesheet" href="css/global/style.css">
    <link rel="stylesheet" href="css/ordenador/style.css">
    <link rel="stylesheet" href="css/tablet/style.css">
    <link rel="stylesheet" href="css/movil/style.css">
    <link rel="stylesheet" href="css/global/respuesta_usuario.css">
    <link rel="stylesheet" href="css/ordenador/respuesta_usuario.css">
    <link rel="stylesheet" href="css/tablet/respuesta_usuario.css">
    <link rel="stylesheet" href="css/movil/respuesta_usuario.css">
    <!--Añadir mas si eso luego-->
</head>

<?php
    include_once "inc/header_reg.php";

    // Select para obtener variables
    $id = mysqli_connect("","root","","daw");
    if(mysqli_connect_errno()) {
        echo mysqli_connect_error();
        exit();
    }

    $result = mysqli_query($id,"
        SELECT 
            u.NomUsuario,
            u.Foto,
            u.FRegistro,
            a.IdAlbum,
            a.Titulo,
            a.Descripcion
        FROM albumes a 
        JOIN usuarios u ON(a.Usuario = u.IdUsuario) 
        WHERE u.IdUsuario = {$_GET["id"]}");

    $row = mysqli_fetch_assoc($result);

        echo <<<hereDOC
                <body>
                <main>
                    <section>
                    <h1>Perfil del usuario</h1>
                        <div id="datos-usuario">
                            <img href="{$row["Foto"]} alt="Foto de perfil">
                            <p>Nombre de usuario: {$row["NomUsuario"]}</p>
                            <p>Fecha de incorporación: {$row["FRegistro"]}</p>
                            <hr>
                            <h3>Lista de álbumes: </h3>
            hereDOC;

            mysqli_data_seek($result, 0);
            while($row = mysqli_fetch_assoc($result)) {
                echo <<<hereDOC
                    <article>
                        <p><a href = "ver-album.php?id={$row["IdAlbum"]}">{$row["Titulo"]}</a></p>
                        <p>{$row["Descripcion"]}</p>
                        <hr>
                    </article>
                hereDOC;
            }
                echo <<<hereDOC
                        </div>
                    </section>
                </main>
            </body>
            hereDOC;
        
    include_once "inc/footer.php";
?>
</html>