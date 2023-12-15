<?php

namespace MVC\Controladores;
use MVC\Modelos\Foto;

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

    public function resultado() {
        $tituloHead = 'Resultados de la búsqueda';
        $css = __FUNCTION__;
        $impresion = true;
        $dialogos = true;
        $datosHead = array('tituloHead', 'css', 'impresion', 'dialogos');

        $modeloFoto = new Foto;

        list($titulo, $desde, $hasta, $pais) = array(
            $_POST["titulo"] ?? "",
            $_POST["fecha-desde"] ?? "",
            $_POST["fecha-hasta"] ?? "",
            $_POST["pais"] ?? -1
        );
        $sql = "
            SELECT f.*, a.Titulo TituloAlbum, a.Descripcion DescripcionAlbum, NomPais
            FROM fotos f
            JOIN albumes a ON(Album = IdAlbum)
            JOIN paises p ON(Pais = IdPais)
            WHERE 1 = 1
        ";
        if($titulo != "") {
            $sql .= "AND f.Titulo = LOWER('$titulo')";
        }
        if($desde != "") {
            $sql .= "AND Fecha >= '$desde'";
        }
        if($hasta != "") {
            $sql .= "AND Fecha <= '$hasta'";
        }
        if($pais > -1) {
            $sql .= "AND Pais = $pais";
        }
        $sql .= ";";

        $fotos = $modeloFoto->consulta($sql)->obtenerTodos();

        return $this->vista('Index.resultado', compact('fotos', $datosHead));
    }
}
