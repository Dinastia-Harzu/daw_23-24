<?php

// Cabría poner esto en algún otro fichero
define('RUTA_APP', './');

define('SERVIDOR', '');
define('USUARIO', 'root');
define('CLAVE', '');
define('BD', 'daw');

define('SEXO_FEMENINO', 0);
define('SEXO_MASCULINO', 1);

define('PAIS_ESP', 1);

define('ESTILO_OSCURO', 1);
define('ESTILO_CLARO', 2);
define('ESTILO_ALTO_CONTRASTE', 3);
define('ESTILO_LETRA_MAYOR', 4);
define('ESTILO_ALTO_CONTRASTE_Y_LETRA_MAYOR', 5);

class Conexion {
    public function __construct() {
        $this->conectar();
    }

    public static function conectar() {
        return new mysqli(SERVIDOR, USUARIO, CLAVE, BD);
    }
}
