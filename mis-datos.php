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
    <link rel="stylesheet" href="css/global/registro.css">
    <link rel="stylesheet" href="css/ordenador/registro.css">
    <link rel="stylesheet" href="css/tablet/registro.css">
    <link rel="stylesheet" href="css/movil/registro.css">
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
    require_once "inc/header.php";

    // Select para obtener variables
    $id = mysqli_connect("","root","","daw");
    if(mysqli_connect_errno()) {
        echo mysqli_connect_error();
        exit();
    }

    $resultado = mysqli_query($id,"SELECT NomPais FROM paises");

    $result_usuario = mysqli_query($id,"
        SELECT 
            NomUsuario,
            Clave,
            Email,
            Sexo,
            FNacimiento,
            Ciudad,
            Pais,
            Foto 
        FROM usuarios
        WHERE NomUsuario = '{$_GET["usu"]}'");

    // Definimos las variables que iran en los campos del usuario
    $fila = mysqli_fetch_assoc($result_usuario);
    $nombre = $fila["NomUsuario"];
    $clave =  $fila["Clave"];
    $correo =  $fila["Email"];
    $fecha_nac =  $fila["FNacimiento"];
    $ciudad =  $fila["Ciudad"];
    $pais = $fila["Pais"];
    $pfp =  $fila["Foto"];
    $texto_submit = "Editar";
?>
    <main>
        <div id="creacion-cuenta">
            <h1>Edita tus datos: </h1>
            <?php
            require_once "inc/form-reg.php";      
            ?>
        </div>
    </main>
<?php
    require_once "inc/footer.php";
?>
</body>
</html>