<?php

namespace MVC\Modelos;

use mysqli;

class Modelo {
    protected $conexion;
    protected $consulta;
    protected $tabla;
    protected $nombreIdTabla = 'id';

    public function __construct() {
        $this->conexion();
    }

    public function conexion() {
        $this->conexion = new mysqli(SERVIDOR, USUARIO, CLAVE, BD);
        if($this->conexion->connect_error) {
            die('Error de conexión' . $this->conexion->connect_errno . ': ' . $this->conexion->connect_error);
        }
    }

    public function consulta($sql) {
        $this->consulta = $this->conexion->query($sql);

        return $this;
    }

    public function primero() {
        return $this->consulta->fetch_assoc();
    }

    public function get() {
        return $this->consulta->fetch_all(MYSQLI_ASSOC);
    }

    // Consultas
    public function obtenerTodos() {
        $sql = "SELECT * FROM {$this->tabla};";

        return $this->consulta($sql)->get();
    }

    public function obtenerPorId(int $id) {
        $sql = "SELECT * FROM {$this->tabla} WHERE {$this->nombreIdTabla} = $id;";

        return $this->consulta($sql)->primero();
    }

    public function filtrar($columna, $operador, $valor = null) {
        if($valor == null) {
            $valor = $operador;
            $operador = '=';
        }
        $sql = "SELECT * FROM {$this->tabla} WHERE $columna $operador '$valor'";
        $this->consulta($sql);

        return $this;
    }

    public function crear($datos) {
        $columnas = array_keys($datos);
        $columnas = implode(', ', $columnas);

        $valores = array_values($datos);
        $valores = "'" . implode("', '", $valores) . "'";

        $sql = "INSERT INTO {$this->tabla}($columnas) VALUES($valores);";

        $this->consulta($sql);
        $id = $this->conexion->insert_id;
        return $this->obtenerPorId($id);
    }

    public function actualizar($id, $datos) {
        $campos = [];

        foreach($datos as $k => $v) {
            $campos[] = "$k = '$v'";
        }

        $campos = implode(', ', $campos);

        $sql = "UPDATE {$this->tabla} SET $campos WHERE {$this->nombreIdTabla} = $id;";
        $this->consulta($sql);

        return $this->obtenerPorId($id);
    }

    public function borrar($id) {
        $sql = "DELETE FROM {$this->tabla} WHERE {$this->nombreIdTabla} = $id;";
        $this->consulta($sql);
    }
}
