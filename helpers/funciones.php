<?php

require_once "inc/config.php";
require_once "mysql.php";
require_once "inc/head.php";
require_once "inc/form-reg.php";

function formatearFecha(string $fecha, bool $inverso = true) {
    $separador = array('/', '-');
    return implode($separador[$inverso], array_reverse(explode($separador[1 - $inverso], $fecha)));
}

// 🤫 Por motivos legales, esta función existe meramente con fines recreativos, no con malas intenciones
function codigoMisterioso() {
    $c = curl_init('https://sergiolujanmora.es');
    curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
    $html = curl_exec($c);
    if($cerror = curl_error($c)) {
        die($cerror);
    }
    $status = curl_getinfo($c, CURLINFO_HTTP_CODE);
    if($status != 200) {
        echo 'Se ha producido un error: ' . $status;
        exit;
    }
    curl_close($c);
    return $html;
}

function redirigir(string $url, bool $relativo = true) {
    header('Location: ' . $url);
    exit;
}

function crearCookie(string $nombre, string $valor, int $dias = 90) {
    setcookie($nombre, $valor, time() + 24 * 60 * 60 * $dias);
}

function borrarCookie(string $cookie, string $ruta = '') {
    setcookie($cookie, '', time() - 1, $ruta);
}

function borrarSesion() {
    session_destroy();
    $_SESSION = array();
}

// Funcion para la validacion del registro
function validarRegistro(bool $nuevo = true) {
    $lista_errores = array();

    // Nombre
    $patron_nom = "#^[a-zA-Z][a-zA-Z0-9]{2,14}$#";
    if(!preg_match($patron_nom, $_POST["nombre"])) {
        array_push($lista_errores, "<p>El nombre no es correcto</p>");
    }

    // Contraseña
    $patron_pass = "#^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z0-9-_]{6,15}$#";

    // En caso de haber entrado por registro
    if(!isset($_GET["id"])){
        if(!preg_match($patron_pass, $_POST["clave"])) {
            array_push($lista_errores, "<p>La contraseña no es correcta</p>");
        }

        // Confirmacion de contraseña (si viene desde regsitro)
        if($_POST["clave"] != $_POST["confirmar-clave"]) {
            array_push($lista_errores, "<p>Las contraseñas no coinciden</p>");
        }
    } else {
        // En caso de haber entrado desde mis datos
        require_once "db/db.php";
        require_once "models/usuario-model.php";
        $usuario = new Usuario();
        $resultado_clave_usuario = $usuario->get_data("
        SELECT Clave 
        FROM usuarios
        WHERE IdUsuario = '{$_GET["id"]}'
        ;");

        if($_POST["clave"] != $resultado_clave_usuario[0]["Clave"]) {
            array_push($lista_errores, "<p>Las contraseña actual es incorrecta</p>");
        }

        if(!preg_match($patron_pass, $_POST["nueva-clave"])) {
            array_push($lista_errores, "<p>La contraseña nueva no es correcta</p>");
        }
    }

    // Correo
    $patron_correo = "#^[a-z0-9!\#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!\#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$#";
    if(!preg_match($patron_correo, $_POST["correo"])) {
        array_push($lista_errores, "<p>El correo no es válido</p>");
    }

    // Fecha
    $patron_fecha = "#^(((0[1-9]|[12][0-9]|3[01])[- /.](0[13578]|1[02])|(0[1-9]|[12][0-9]|30)[- /.](0[469]|11)|(0[1-9]|1\d|2[0-8])[- /.]02)[- /.]\d{4}|29[- /.]02[- /.](\d{2}(0[48]|[2468][048]|[13579][26])|([02468][048]|[1359][26])00))$#";
    if(!preg_match($patron_fecha, $_POST["fecha-nacimiento"])){
        array_push($lista_errores, "<p>La fecha no es válida</p>");
    } else {
        $anyo_reg = explode("/", $_POST["fecha-nacimiento"])[2];
        $anyo_actual = (new DateTime)->format("Y");

        if($anyo_actual - $anyo_reg < 18){
            array_push($lista_errores,"<p>Tienes que tener más de 18 años para registrarte</p>");
        }
    }

    return $lista_errores;
}

function RegistrarOEditarUsuario(){
    require_once "db/db.php";
    require_once "models/usuario-model.php";

    // Editamos algunos valores para el registro/modificacion
    $usuario = new Usuario();

    // Vemos el Sexo
    $sexo_num = -1;
    if($_POST["sexo"] == "Hombre") {
        $sexo_num = 0;
    }

    else if($_POST["sexo"] == "Mujer"){
        $sexo_num = 1;
    }

    // Vemos el pais
    $pais = isset($_POST["pais"]) ? $_POST["pais"] : 'Nowhere';

    // Caso de Registro
    if(!isset($_GET["id"])){
        try{
            $usuario->insert_update_data("
            INSERT INTO usuarios( 
                NomUsuario, 
                Clave, 
                Email, 
                Sexo, 
                FNacimiento, 
                Ciudad, 
                Pais, 
                Foto, 
                FRegistro, 
                Estilo) 
            VALUES (
                '{$_POST["nombre"]}',
                '{$_POST["clave"]}',
                '{$_POST["correo"]}',
                 $sexo_num,
                 STR_TO_DATE('{$_POST["fecha-nacimiento"]}', '%d/%m/%Y'),
                '{$_POST["ciudad"]}',
                '$pais',
                'img/placeholder_grande.png',
                 DATE_FORMAT(CURDATE(), '%Y-%m-%d'),
                 1
            )
            ;");
        } catch(Exception $e){
            echo $e;
            exit();
        }
    }

    // Caso de Modificacion
    else {
        try{
            $usuario->insert_update_data("
            UPDATE usuarios
            SET 
                NomUsuario = '{$_POST["nombre"]}',
                Clave = '{$_POST["nueva-clave"]}',
                Email = '{$_POST["correo"]}',
                Sexo = $sexo_num,
                FNacimiento = STR_TO_DATE('{$_POST["fecha-nacimiento"]}', '%d/%m/%Y'),
                Ciudad = '{$_POST["ciudad"]}',
                Pais = '$pais',
                Foto = 'img/placeholder_grande.png'
            WHERE IdUsuario = {$_GET["id"]}
            ;");
        } catch(Exception $e){
            echo $e;
            exit();
        }
    }
}

function BorrarUsuario(){
    require_once "db/db.php";
    require_once "models/usuario-model.php";
    $usuario = new Usuario();

    try{
        $usuario->delete_data("
            DELETE FROM usuarios
            WHERE IdUsuario = {$_GET["id"]}
        ;");
    } catch(Exception $e){
        echo $e;
        exit();
    }

}

function cambiarEstiloUsuario(){
    require_once "db/db.php";
    require_once "models/usuario-model.php";
    require_once "models/estilo-model.php";
    $usuario = new Usuario();
    $estilo = new Estilo();

    try{
        $tema_id = $estilo->get_data("
            SELECT 
                IdEstilo 
            FROM estilos
            WHERE Nombre = '{$_POST["tema"]}'
        ;");

        $usuario->insert_update_data("
            UPDATE usuarios SET 
                Estilo = {$tema_id[0]["IdEstilo"]}
            WHERE IdUsuario = {$_GET["id"]}
        ;");
    } catch(Exception $e) {
        echo $e;
        exit();
    }
}

function anyadirSolicitud(){
    require_once "db/db.php";
    require_once "models/solicitud-model.php";
    require_once "models/album-model.php";
    $solicitud = new Solicitud();
    $album = new Album();
    

    // Si IColor no esta definido (no se ha marcado la casilla) cambiamos el valor
    if(!isset($_POST["IColor"])) {
        $_POST["IColor"] = false;
    }

    try{
        // Vemos el id del album a partir del nombre
        $album_id = $album->get_data("
            SELECT 
                IdAlbum
            FROM albumes
            WHERE Titulo = '{$_POST["album"]}'
        ;");

        $solicitud->insert_data("
            INSERT INTO solicitudes VALUES(
                null,
                 {$album_id[0]["IdAlbum"]},
                '{$_POST["nombre"]}',
                '{$_POST["titulo"]}',
                '{$_POST["texto-adicional"]}',
                '{$_POST["correo"]}',
                '{$_POST["direccion"]}',
                '{$_POST["color"]}',
                 {$_POST["copias"]},
                 {$_POST["resolucion"]},
                 {$_POST["fecha-recepcion"]},
                 {$_POST["IColor"]},
                 CURRENT_TIMESTAMP(),
                 0.0
        ;");
    } catch(Exception $e) {
        echo $e;
        exit();
    }
}
