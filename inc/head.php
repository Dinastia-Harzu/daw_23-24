<?php

function generarHead(string $titulo = 'Masthermatika', string $estilo = 'oscuro') {
    echo <<<hereDOC
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>$titulo</title>
            <link rel="stylesheet" href="css/global/style.css">
            <link rel="stylesheet" href="css/ordenador/style.css">
            <link rel="stylesheet" href="css/tablet/style.css">
            <link rel="stylesheet" href="css/movil/style.css">
            <link rel="stylesheet" href="css/global/busqueda.css">
            <link rel="stylesheet" href="css/ordenador/busqueda.css">
            <link rel="stylesheet" href="css/tablet/busqueda.css">
            <link rel="stylesheet" href="css/movil/busqueda.css">
            <link rel="stylesheet" href="css/modos-alternativos/$estilo.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        </head>
    hereDOC;
}
