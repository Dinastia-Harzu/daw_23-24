<?php

namespace MVC\Controladores;
use MVC\Modelos\Usuario;

class ControladorUsuario extends Controlador {
    public function usuario() {
        $modelo = new Usuario;

        $usuarios = $modelo->obtenerTodos();

        return $this->vista('Usuario.usuario', compact('usuarios'));
    }

    public function controlUsuario() {
        return $this->vista('Usuario.control-usuario');
    }
}