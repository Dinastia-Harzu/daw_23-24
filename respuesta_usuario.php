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
    include("inc/header.php");
?>
    <main> 
<!-- Empezamos con PHP -->
<?php
    // Empezamos a comprobar los campos
    if($_POST["nombre"] == "" || $_POST["contraseña"] == "" || $_POST["confirmar-contraseña"] == "" || 
    $_POST["contraseña"] != $_POST["confirmar-contraseña"])
    {
        echo "<h2>Lo sentimos, ha habido un error en los siguientes datos del registro:</h2>";
        
        // Mostramos mensajes de error
        if($_POST["nombre"] == "")
            echo "<p class=\"error-datos-usuario\">No se ha introducido un nombre de usuario</p>";
    

        if($_POST["contraseña"] == "")
            echo "<p class=\"error-datos-usuario\">No se ha introducido la contraseña</p>";
    

        if($_POST["confirmar-contraseña"] == "")
            echo "<p class=\"error-datos-usuario\">No se ha introducido por segunda vez la contraseña</p>";
    

        if($_POST["contraseña"] != $_POST["confirmar-contraseña"])
            echo "<p class=\"error-datos-usuario\">La contraseña y la confirmación de contraseña no coinciden</p>";
    
            
        echo "<a href=\"registro.php\" id=\"btn-volver-registro\">Volver al registro</a>";

    }

    // Si los datos estan bien, creamos la cookie (o la sesion no lo se) y la rellenamos

    else{
        // ESTA COOKIE ES DE PRUEBA Y SE BORRARA AL TERMINAR
        setcookie("nombre", $_POST["nombre"], time() + 90 * 24 * 60 * 60, "/");
        session_start();

        // Calculamos que mensaje deberia aparecer para el usuario
        date_default_timezone_set('Europe/Madrid'); 

        $hora_actual = date('H:i'); 
        $nombre_usuario = $_POST["nombre"];

        if ($hora_actual >= '06:00' && $hora_actual <= '11:59') 
            $mensaje = "Buenos días $nombre_usuario";

        elseif ($hora_actual >= '12:00' && $hora_actual <= '15:59') 
            $mensaje = "Hola $nombre_usuario";

        elseif ($hora_actual >= '16:00' && $hora_actual <= '19:59') 
            $mensaje = "Buenas tardes $nombre_usuario";

        else 
            $mensaje = "Buenas noches $nombre_usuario, estos son tus datos";
    
        echo <<<hereDOC
            <section>
            <h1>$mensaje</h1>
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
    include("inc/footer.php");
?>
</body>
</html>