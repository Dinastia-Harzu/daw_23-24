<?php

namespace MVC;

class Enrutador {
    private static $rutas = array();

    public static function agregarRutaMetodo($metodo, $uri, $cb) {
        $uri = trim($uri, '/');
        self::$rutas[$metodo][$uri] = $cb;
    }

    public static function despachar() {
        $uri = $_SERVER['REQUEST_URI'];
        $uri = trim($uri, '/');
        $uri = explode('/', $uri);
        $uri = array_slice($uri, 0);
        $uri = implode('/', $uri);

        $metodo = $_SERVER['REQUEST_METHOD'];   

        foreach(self::$rutas[$metodo] as $ruta => $cb) {
            if(strpos($ruta, ':') !== false) {
                $ruta = preg_replace('#:[\w]+#', '([\w]+)', $ruta);
            }

            if(preg_match("#^$ruta$#", $uri, $coincide)) {
                $parametros = array_slice($coincide, 1);
                if(is_callable($cb)) {
                    $respuesta = $cb(...$parametros);
                }
                if(is_array($cb)) {
                    $controlador = new $cb[0];
                    $respuesta = $controlador->{$cb[1]}(...$parametros);
                }
                if(is_array($respuesta) || is_object($respuesta)) {
                    echo json_encode($respuesta);
                } else {
                    echo $respuesta;
                }
                return;
            }
        }

        echo '404 Not Found';
    }
}
