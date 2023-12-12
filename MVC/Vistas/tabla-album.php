<?php
    $ffp = 3;
    $max_filas = 15;

    function calcularTarifa($paginas, $extra_color = 0, $extra_resolucion = 0) {
        $precio = 0;
        for($i = 1; $i <= $paginas; $i++) {
            if($i < 5) {
                $precio += 0.10;
            } else {
                $precio += $i > 11 ? 0.07 : 0.08;
            }
        }
        return number_format($precio + (0.05 * $extra_color + 0.02 * $extra_resolucion) * 3 * $paginas, 2) . '€';
    }

    function crearCelda($contenido = '') {
        return '<td>' . $contenido . '</td>';
    }

    echo <<<hereDOC
        <table>
            <caption>Tabla de precios calculada</caption>
            <tr>
                <th colspan="2">$ffp fotos por página</th>
                <th colspan="2">Blanco y negro</th>
                <th colspan="2">A color</th>
            </tr>
            <tr>
                <th>Número de páginas</th>
                <th>Número de fotos</th>
                <th>150-300 dpi</th>
                <th>450-900 dpi</th>
                <th>150-300 dpi</th>
                <th>450-900 dpi</th>
            </tr>
    hereDOC;

    for($i = 1; $i <= $max_filas; $i++) {
        echo '<tr>';
        echo crearCelda($i);
        echo crearCelda($i * $ffp);
        echo crearCelda(calcularTarifa($i));
        echo crearCelda(calcularTarifa($i, 0, 1));
        echo crearCelda(calcularTarifa($i, 1));
        echo crearCelda(calcularTarifa($i, 1, 1));
        echo '</tr>';
    }
    echo '</table>';
?>
