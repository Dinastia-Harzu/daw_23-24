<?php

namespace MVC\Controladores;
use MVC\Modelos\Foto;
use MVC\Modelos\Usuario;

class ControladorIndex extends Controlador {
    public function index() {
        $titulo = '';
        $css = __FUNCTION__;
        $impresion = true;
        $dialogos = true;
        $datosHead = array('titulo', 'css', 'impresion', 'dialogos');

        $modeloFoto = new Foto;

        $fotos = $modeloFoto->obtenerTodos();
        return $this->vista('Index.index', compact('fotos', $datosHead));
    }
}
