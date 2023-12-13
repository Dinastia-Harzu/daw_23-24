<?php
    require_once "helpers/funciones.php";
    session_start();

    generarHead('mis-datos');
?>
<body>
<?php
    require_once "inc/header.php";

    // Definimos las variables que iran en los campos del usuario
    $fila = $resultado_usuario_misdatos[0];
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
            generarFormularioRegistro($nombre, $clave, $correo, $fecha_nac, $ciudad, $pfp, $pais, $resultado_pais_misdatos, false);     
            ?>
        </div>
    </main>
<?php
    require_once "inc/footer.php";
?>
</body>
</html>