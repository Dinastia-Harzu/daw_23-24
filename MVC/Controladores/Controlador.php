<?php

namespace MVC\Controladores;

class Controlador {
    public function vista($fichero, $datos = []) {
        extract($datos);
        $fichero = str_replace('.', '/', $fichero);
        $ruta = "MVC/Vistas/$fichero.php";
        if(file_exists($ruta)) {
            ob_start();
            require_once $ruta;
            return ob_get_clean();
        } else {
            return "El fichero $ruta no existe";
        }
    }
}
