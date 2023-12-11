<?php

class Foto {
    private $db;
    private $data;

    public function __construct() {
        $this->db = Conexion::conexion();
        $this->data = array();
    }

    public function __destruct() {
        $this->db->close();
    }

    public function get_data(string $q) {
        $consulta = $this->db->query($q);

        while($filas = $consulta->fetch_assoc()) {
            $this->data[] = $filas;
        }
        return $this->data;
    }
}
?>