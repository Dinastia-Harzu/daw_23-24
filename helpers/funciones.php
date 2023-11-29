<?php

require_once "mysql.php";
require_once "inc/head.php";

function formatearFecha(string $fecha, bool $inverso = true) {
    $separador = array('/', '-');
    return implode($separador[$inverso], array_reverse(explode($separador[1 - $inverso], $fecha)));
}
