<?php

namespace MVC\Controladores;
use MVC\Modelos\Usuario;

class ControladorInicio extends Controlador {
    public function index() {
        $modeloUsuario = new Usuario();

        $modeloUsuario->borrar(7);
        return 'Eliminado';

        return $this->vista('inicio', [
            'titulo' => 'Inicio',
            'descripcion' => 'Hola mundo desde la página de inicio'
        ]);
    }
}
