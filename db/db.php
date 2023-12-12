<?php
class Conexion{
    public static function conexion(){
        return new mysqli("", "root", "", "daw");
    }
}

?>