window.addEventListener('load', () => {
    const tabla = $('central').querySelector('aside')
        .appendChild(document.createElement('table'));
    const max_filas = 15;
    const fpp = 2;

    tabla
        .insertRow()
            .appendChild(crearElemento('th', {colSpan: 2}))
                .appendChild(document.createTextNode(`${fpp} fotos por página`))
            .parentElement
        .parentElement
            .appendChild(crearElemento('th', {colSpan: 2}))
                .appendChild(document.createTextNode('Blanco y negro'))
            .parentElement
        .parentElement
            .appendChild(crearElemento('th', {colSpan: 2}))
                .appendChild(document.createTextNode('A color'))
            .parentElement
        .parentElement
    .parentElement
        .insertRow()
            .appendChild(crearElemento('th', {}))
                .appendChild(document.createTextNode('Número de páginas'))
            .parentElement
        .parentElement
            .appendChild(crearElemento('th', {}))
                .appendChild(document.createTextNode('Número de fotos'))
            .parentElement
        .parentElement
            .appendChild(crearElemento('th', {}))
                .appendChild(document.createTextNode('150-300 dpi'))
            .parentElement
        .parentElement
            .appendChild(crearElemento('th', {}))
                .appendChild(document.createTextNode('450-900 dpi'))
            .parentElement
        .parentElement
            .appendChild(crearElemento('th', {}))
                .appendChild(document.createTextNode('150-300 dpi'))
            .parentElement
        .parentElement
            .appendChild(crearElemento('th', {}))
                .appendChild(document.createTextNode('450-900 dpi'));

    for(let i = 1; i <= max_filas; i++) {
        tabla
            .insertRow()
                .insertCell()
                    .appendChild(document.createTextNode(i))
                .parentElement
            .parentElement
                .insertCell()
                    .appendChild(document.createTextNode(i * fpp))
                .parentElement
            .parentElement
                .insertCell()
                    .appendChild(document.createTextNode(calcularTarifa(i)))
                .parentElement
            .parentElement
                .insertCell()
                    .appendChild(document.createTextNode(calcularTarifa(i, 0, 1)))
                .parentElement
            .parentElement
                .insertCell()
                    .appendChild(document.createTextNode(calcularTarifa(i, 1)))
                .parentElement
            .parentElement
                .insertCell()
                    .appendChild(document.createTextNode(calcularTarifa(i, 1, 1)));
    }
    $('central').querySelector('aside').appendChild(tabla);
});

function calcularTarifa(paginas, extra_color = 0, extra_resolucion = 0) {
    let precio = 0;
    for(let i = 1; i <= paginas; i++) {
        precio += i < 5 ? 0.10 : (i > 11 ? 0.07 : 0.08);
    }
    return `${(precio + (0.05 * extra_color + 0.02 * extra_resolucion) * 3 * paginas).toFixed(2)}€`;
}