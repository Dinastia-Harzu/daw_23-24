const articulos = [
    {
        titulo: 'Lemniscata',
        fecha: '12/05/2023',
        pais: 'España',
        codpais: 'ES'
    },
    {
        titulo: 'Campana de Gauss',
        fecha: '28/09/2022',
        pais: 'Bélgica',
        codpais: 'BEL'
    },
    {
        titulo: 'Icosaedro',
        fecha: '07/11/2024',
        pais: 'Estados Unidos',
        codpais: 'USA'
    },
    {
        titulo: 'Conjunto de Mandlebrot',
        fecha: '19/03/2023',
        pais: 'Reino Unido',
        codpais: 'UK'
    },
    {
        titulo: 'Derivadas e integrales',
        fecha: '30/07/2025',
        pais: 'Alemania',
        codpais: 'AL'
    },
    {
        titulo: 'Función de Riemann',
        fecha: '14/02/2024',
        pais: 'China',
        codpais: 'CHI'
    },
];

window.addEventListener('load', () => {
    const id = 'filtro';
    document.getElementsByClassName('tab-busc')[0]
        .appendChild(crearElemento('p', {}))
            .appendChild(crearElemento('label', {for: id}))
                .appendChild(document.createTextNode('Filtro:'))
            .parentElement
        .parentElement
            .appendChild(crearElemento('select', {name: id, id: id}, 'change', evt => {
                const valor = evt.target.value.split('-');
                const filtro = valor[0];
                const orden = valor[1] == 'true' ? 1 : -1;
                articulos.sort((a, b) => {
                    switch(filtro) {
                        case 'titulo':
                        case 'codpais': {
                            const tituloA = a[filtro].toUpperCase();
                            const tituloB = b[filtro].toUpperCase();
                            if(tituloA < tituloB) {
                                return -1 * orden;
                            }
                            if(tituloA > tituloB) {
                                return 1 * orden;
                            }
                            return 0;
                        }
                        case 'fecha': {
                            return (convertirFechaANumero(a[filtro]) - convertirFechaANumero(b[filtro])) * orden;
                        }
                        default:
                    }
                });
                actualizarArticulos();
            }))
                .appendChild(crearElemento('option', {value: 'NA', selected: true, disabled: true}))
                    .appendChild(document.createTextNode('-- Selecciona una opción --'))
                .parentElement
            .parentElement
                .appendChild(crearElemento('option', {value: 'titulo-true'}))
                    .appendChild(document.createTextNode('-Por título de la A a la Z'))
                .parentElement
            .parentElement
                .appendChild(crearElemento('option', {value: 'titulo-false'}))
                    .appendChild(document.createTextNode('-Por título de la Z a la A'))
                .parentElement
            .parentElement
                .appendChild(crearElemento('option', {value: 'fecha-true'}))
                    .appendChild(document.createTextNode('Más antiguos'))
                .parentElement
            .parentElement
                .appendChild(crearElemento('option', {value: 'fecha-false'}))
                    .appendChild(document.createTextNode('Más recientes'))
                .parentElement
            .parentElement
                .appendChild(crearElemento('option', {value: 'codpais-true'}))
                    .appendChild(document.createTextNode('Por código de país de la A a la Z'))
                .parentElement
            .parentElement
                .appendChild(crearElemento('option', {value: 'codpais-false'}))
                    .appendChild(document.createTextNode('Por código de país de la Z a la A'));
});

function actualizarArticulos() {
    const section = document.getElementsByClassName('grid-img')[0];
    let hijo = section.firstChild;
    while(hijo) {
        hijo.remove();
        hijo = section.firstChild;
    }
    for(const articulo of articulos) {
        section
            .appendChild(crearElemento('article', {}))
                .appendChild(crearElemento('h2', {}))
                    .appendChild(document.createTextNode(articulo.titulo))
                .parentElement
            .parentElement
                .appendChild(crearElemento('a', {href: 'detalle.html'}))
                    .appendChild(crearElemento('img', {
                        src: `img/foto${Math.floor(Math.random() * 4 + 1)}.png`,
                        alt: articulo.titulo
                    }))
                .parentElement
            .parentElement
                .appendChild(crearElemento('p', {}))
                    .appendChild(document.createTextNode(`${articulo.pais} (${articulo.codpais})`))
                .parentElement
            .parentElement
                .appendChild(crearElemento('time', {}))
                    .appendChild(document.createTextNode(articulo.fecha));
    }
}

function convertirFechaANumero(fecha) {
    fecha = fecha.split('/');
    return Number(fecha[2] + fecha[1] + fecha[0]);
}
