<!DOCTYPE html>
<html lang="es">
<?php
    require_once "helpers/funciones.php";

    generarHead('respuesta-usuario');

?>
<body>
<?php
    require_once "inc/header.php";
?>
    <main> 
<?php
    // Si vamos a la página mediante la URL directamente, debemos redirigir a index.php
    if (!isset($_POST["nombre"])) {
        header("Location: index.php");
        exit;
    }

    // Validamos
    $mensaje = validarRegistro();
    if(count($mensaje) != 0) {
        echo <<<hereDOC
            <h2>Lo sentimos, ha habido un error en los siguientes datos del registro:</h2>
            <div id="datos-usuario">
        hereDOC;
        foreach ($mensaje as $fila) {
            echo $fila;
        }
        echo '</div>';
    }

    // Si los datos estan bien, creamos la cookie (o la sesion no lo se) y la rellenamos

    else {
        session_start();
        $_SESSION["usuario"] = $_POST["nombre"];
        $_SESSION["clave"] = $_POST["clave"];
        $_SESSION["correo"] = $_POST["correo"];
        $_SESSION["ciudad"] = $_POST["ciudad"];
        $_SESSION["pais"] = isset($_POST["pais"]) ? $_POST["pais"] : 'Nowhere';

        // Calculamos que mensaje deberia aparecer para el usuario
        date_default_timezone_set('Europe/Madrid'); 

        $hora_actual = date('H:i'); 
        $nombre_usuario = $_POST["nombre"];

        if ($hora_actual >= '06:00' && $hora_actual <= '11:59') {
            $mensaje = "Buenos días $nombre_usuario";
        } elseif ($hora_actual >= '12:00' && $hora_actual <= '15:59') {
            $mensaje = "Hola $nombre_usuario";
        } elseif ($hora_actual >= '16:00' && $hora_actual <= '19:59') {
            $mensaje = "Buenas tardes $nombre_usuario";
        } else {
            $mensaje = "Buenas noches $nombre_usuario, estos son tus datos";
        }
    
        echo <<<hereDOC
            <section>
            <h1>$mensaje</h1>
                <div id="datos-usuario">
                    <p>Nombre de usuario: {$_POST["nombre"]}</p>
                    <p>Contraseña: {$_POST["clave"]}</p>
                    <p>Correo: {$_POST["correo"]}</p>
                    <p>Sexo: {$_POST["sexo"]}</p>
                    <p>Fecha de nacimiento: {$_POST["fecha-nacimiento"]}</p>
                    <p>Ciudad: {$_POST["ciudad"]}</p>
                </div>
            </section>
        hereDOC;

        // Llamamos a las funciones para hacer INSERT o UPDATE (dependiendo de si estamos registrando o editando)
        RegistrarOEditarUsuario();
    }
?>
    </main>
<?php
    require_once "inc/footer.php";
?>
</body>
</html>