<?php

namespace MVC\Modelos;
use mysqli;

class Usuario extends Modelo {
    protected $tabla = 'usuarios';
    protected $nombreIdTabla = 'IdUsuario';
}
