<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Masthermatika</title>
    <link rel="stylesheet" href="css/global/style.css">
    <link rel="stylesheet" href="css/ordenador/style.css">
    <link rel="stylesheet" href="css/tablet/style.css">
    <link rel="stylesheet" href="css/movil/style.css">
    <link rel="stylesheet" href="css/global/respuesta_usuario.css">
    <link rel="stylesheet" href="css/ordenador/respuesta_usuario.css">
    <link rel="stylesheet" href="css/tablet/respuesta_usuario.css">
    <link rel="stylesheet" href="css/movil/respuesta_usuario.css">
    <link rel="alternate stylesheet" href="css/modos-alternativos/oscuro.css" title="Modo oscuro (predeterminado)">
    <link rel="alternate stylesheet" href="css/modos-alternativos/claro.css" title="Modo claro">
    <link rel="alternate stylesheet" href="css/modos-alternativos/alto-contraste.css" title="Modo de alto contraste">
    <link rel="alternate stylesheet" href="css/modos-alternativos/letra-mayor.css" title="Modo de tipo de letra mayor">
    <link rel="alternate stylesheet" href="css/modos-alternativos/letra-mayor-y-alto-contraste.css" title="Modo de letra mayor y alto contraste">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="javascript/common.js"></script>
</head>
<body>
<?php
    include_once "inc/header.php";
?>
    <main> 
<!-- Empezamos con PHP -->
<?php
    // Empezamos a comprobar los campos
    if($_POST["nombre"] == "" || $_POST["contraseña"] == "" || $_POST["confirmar-contraseña"] == "" || 
    $_POST["contraseña"] != $_POST["confirmar-contraseña"])
    {
        echo <<<hereDOC
        <h2>Lo sentimos, ha habido un error en los siguientes datos del registro:</h2>
        hereDOC;
        // Mostramos mensajes de error
        if($_POST["nombre"] == "")
            echo<<<hereDOC
                <p class="error-datos-usuario">No se ha introducido un nombre de usuario</p>
            hereDOC;

        if($_POST["contraseña"] == "")
            echo<<<hereDOC
                <p class="error-datos-usuario">No se ha introducido la contraseña</p>
            hereDOC;

        if($_POST["confirmar-contraseña"] == "")
            echo<<<hereDOC
            <p class="error-datos-usuario">No se ha introducido por segunda vez la contraseña</p>
            hereDOC;

        if($_POST["contraseña"] != $_POST["confirmar-contraseña"])
            echo<<<hereDOC
                <p class="error-datos-usuario">La contraseña y la confirmación de contraseña no coinciden</p>
            hereDOC;
            
        echo<<<hereDOC
            <a href="registro.php" id="btn-volver-registro">Volver al registro</a>
        hereDOC;
    }

    // Si los datos estan bien, mostramos un mensaje de confirmacion y mostramos todos los datos del usuario
    else{
        echo <<<hereDOC
            <section>
            <h1>Inserción realizada, tus datos son:</h1>
                <div id="datos-usuario">
                    <p>Nombre de usuario: {$_POST["nombre"]}</p>
                    <p>Contraseña: {$_POST["contraseña"]}</p>
                    <p>Correo: {$_POST["correo"]}</p>
                    <p>Sexo: {$_POST["sexo"]}</p>
                    <p>Fecha de nacimiento: {$_POST["fecha-nacimiento"]}</p>
                    <p>Ciudad: {$_POST["ciudad"]}</p>
                </div>
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