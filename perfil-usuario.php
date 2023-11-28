<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mastermatika - Perfil usuario</title>
</head>

<?php
    include_once "inc/header.php";
?>

<body>
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
</body>

<?php
    include_once "inc/footer.php";
?>


</html>