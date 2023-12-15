<?php

function generarHead(string $pagina, string $estilo = null, bool $dialogos = false, bool $impresion = false) {
    if(!$estilo) {
        $estilo = $pagina;
    }
    $titulo = array(
        'accesibilidad' => 'Accesibilidad',
        'busqueda' => 'Descubrir',
        'configurar' => 'Configurar estilos',
        'control-usuario' => 'Control usuario',
        'crear-album' => 'Crear álbum',
        'detalle' => 'Título imagen',  // TODO
        'index' => 'Masthermatika',
        'mis-albumes' => 'Mis álbumes',
        'mis-datos' => 'Mis datos',
        'mis-fotos' => 'Mis fotos',
        'perfil-usuario' => 'Usuario',  // TODO
        'publicar' => 'Publicar',
        'registro' => 'Registro',
        'respuesta-album' => 'Respuesta a la solicitud de álbum',
        'respuesta-usuario' => 'Respuesta al registro de usuario',
        'respuesta-publicar' => 'Respuesta a la publicacion de imagen',
        'respuesta-eliminacion' => 'Respuesta a la eliminacion de cuenta',
        'respuesta-crear-album' => 'Respuesta a la creación de álbum',
        'respuesta-configuracion' => 'Respuesta a la nueva configuracion de estilo',
        'resultado' => 'Resultado de la búsqueda',
        'solicitar-album' => 'Solicitar állbum',
        'tabla-album' => 'Tabla del álbum',
        'usuario' => 'Usuario',  // TODO
        'ver-album' => 'Ver álbum',
        'ver-album-priv' => 'Ver álbum',
        'eliminar-cuenta' => 'Confirmación de eliminación de cuenta'
    );
    $tema = $_SESSION["tema"] ?? 'oscuro';
    if(isset($_SESSION["usuario"])) {
        $usuario = new Usuario;
        $datos = $usuario->get_data("
            SELECT *
            FROM estilos
            JOIN usuarios ON(IdEstilo = Estilo)
            WHERE NomUsuario = '{$_SESSION["usuario"]}'
        ;");
        $tema = $datos[0]["Nombre"];
    }
    echo <<<hereDOC
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>{$titulo[$pagina]}</title>
            <link rel="stylesheet" href="css/global/style.css">
            <link rel="stylesheet" href="css/ordenador/style.css">
            <link rel="stylesheet" href="css/tablet/style.css">
            <link rel="stylesheet" href="css/movil/style.css">
            <link rel="stylesheet" href="css/global/$estilo.css">
            <link rel="stylesheet" href="css/ordenador/$estilo.css">
            <link rel="stylesheet" href="css/tablet/$estilo.css">
            <link rel="stylesheet" href="css/movil/$estilo.css">
            <link rel="stylesheet" href="css/modos-alternativos/$tema.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    hereDOC;
    if($impresion) {
        echo <<<hereDOC
            <link rel="stylesheet" href="css/impresion/style.css" media="print">
            <link rel="stylesheet" href="css/impresion/$estilo.css" media="print">
        hereDOC;
    }
    if($dialogos) {
        echo <<<hereDOC
            <script src="javascript/common.js"></script>
            <script src="javascript/dialogos.js"></script>
            <script src="javascript/$pagina.js"></script>
        hereDOC;
    }
    echo '</head>';
}
