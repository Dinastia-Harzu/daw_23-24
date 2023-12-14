<?php

namespace MVC\Controladores;

class Controlador {
    public function vista($fichero, $datos = []) {
        extract($datos);
        $fichero = str_replace('.', '/', $fichero);
        $pagina = explode('/', $fichero);
        $pagina = end($pagina);
        $ruta = "MVC/Vistas/$fichero.php";
        if(file_exists($ruta)) {
            ob_start();
            require_once 'inc/head.php';
            echo '<body>';
            require_once 'inc/header.php';
            require_once $ruta;
            require_once 'inc/footer.php';
            echo '</body>';
            return ob_get_clean();
        } else {
            return "El fichero $ruta no existe";
        }
    }

    public function redirigir($ruta) {
        header("Location: $ruta");
    }

    public function accesibilidad() {
        return $this->vista('accesibilidad');
    }

    public function error() {
        return $this->vista('404');
    }
}
