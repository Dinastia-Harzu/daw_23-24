<?php

    $usuarios = array(
        'ADMIN' => 'ADMIN123',
        'DEBUG' => 'DEBUG',
        'agrg11' => 'contraseña',
        'mgv' => 'password'
    );
    $host = 'localhost';
    $uri = 'daw_23-24';
    
    if(!isset($_POST['nombre']) || !isset($_POST['contraseña'])) {
        $pagina = 'index.no_registrado.html';
        header("Location: http://$host/$uri/$pagina");
        exit;
    }

    $nombre = $_POST["nombre"];
    $contraseña = $_POST["contraseña"];

    if(isset($usuarios[$nombre]) && array_search($contraseña, $usuarios, true)) {
        $pagina = 'usuario.html';
        header("Location: http://$host/$uri/$pagina");
        exit;
    } else {
        $pagina = 'index.no_registrado.html';
        header("Location: http://$host/$uri/$pagina");
        exit;
    }

?>