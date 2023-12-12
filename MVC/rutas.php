<?php

use MVC\Enrutador;
use MVC\Controladores\ControladorInicio;

Enrutador::agregarRutaMetodo('GET', '/', [ControladorInicio::class, 'index']);

Enrutador::agregarRutaMetodo('GET', '/contacto', function() {
    return 'Hola desde la página de contacto';
});

Enrutador::agregarRutaMetodo('GET', '/acerca', function() {
    return 'Hola desde la página acerca de';
});

Enrutador::agregarRutaMetodo('POST', '/hola/mundo', function() {
    return 'Hola mundo desde Postman';
});

Enrutador::agregarRutaMetodo('DELETE', '/hola/mundo', function() {
    return 'Postman DELETE';
});

Enrutador::agregarRutaMetodo('GET', '/usuarios/:NomUsuario', function($parametro) {
    return "El usuario es: $parametro";
});

Enrutador::despachar();
