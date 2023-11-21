/**
 * 
 * @param {string} etiqueta 
 * @param {Object} lista...propiedades 
 * @param {string} accion 
 * @param {Function} reaccion 
 */
function crearElemento(etiqueta, {lista, ...propiedades}, accion, reaccion) {
    const elemento = document.createElement(etiqueta);
    if(lista) {
        elemento.setAttribute('list', lista);
    }
    Object.assign(elemento, propiedades);
    if(accion && reaccion) {
        elemento.addEventListener(accion, reaccion);
    }

    return elemento;
}

/**
 * 
 * @param {string} id 
 * @returns {HTMLElement}
 */
function $(id) {
    return document.getElementById(id);
}

/**
 * 
 * @param {Event} evt 
 */
function validarFormulariolLogin(evt) {
    for(const campo of new FormData(evt.target)) {
        if(campo[1].trim().length == 0) {
            evt.preventDefault();
            alert('Escribe algo en ambos campos.');
            return;
        }
    }
}

// const busquedaRapidaBloqueHTML =
//     crearElemento('form', {action: 'resultado.no_registrado.html'})
//         .appendChild(crearElemento('input', {
//             type: 'text',
//             name: 'busqueda-rapida',
//             placeholder: 'Búsqueda rápida'
//         }))
//         .parentElement
//             .appendChild(crearElemento('button', {type: 'submit'}))
//                 .appendChild(crearElemento('i', {className: 'fa-fa-search'}))
//             .parentElement
//         .parentElement;

// window.addEventListener('load', () => {
//     console.log(busquedaRapidaBloqueHTML);
//     document.body.insertBefore(
//         crearElemento('header', {})
//             .appendChild(crearElemento('aside', {}))
//                 .appendChild(crearElemento('figure', {}))
//                     .appendChild(crearElemento('img', {
//                         src: 'img/logo-y-nombre.png',
//                         alt: 'Logo, nombre y subtítulo de la página: Masthermatika',
//                         id: 'logo'
//                     }))
//                 .parentElement
//             .parentElement
//                 .appendChild(crearElemento('nav', {}))
//                     .appendChild(crearElemento('ul', {id: 'nav-texto'}))
//                         .appendChild(crearElemento('li', {}))
//                             .appendChild(crearElemento('a', {href: 'index.no_registrado.html'}))
//                                 .appendChild(document.createTextNode('Inicio'))
//                             .parentElement
//                         .parentElement
//                     .parentElement
//                         .appendChild(crearElemento('li', {}))
//                             .appendChild(crearElemento('a', {href: 'busqueda.html'}))
//                                 .appendChild(document.createTextNode('Descubrir'))
//                             .parentElement
//                         .parentElement
//                     .parentElement
//                         .appendChild(crearElemento('li', {}))
//                             .appendChild(crearElemento('a', {href: '#'}))
//                                 .appendChild(document.createTextNode('Publicar'))
//                             .parentElement
//                         .parentElement
//                     .parentElement
//                 .parentElement
//                     .appendChild(crearElemento('ul', {id: 'nav-iconos'}))
//                         .appendChild(crearElemento('li', {}))
//                             .appendChild(crearElemento('a', {href: 'index.no_registrado.html'}))
//                                 .appendChild(crearElemento('i', {className: 'fa-fa-home'}))
//                             .parentElement
//                         .parentElement
//                     .parentElement
//                         .appendChild(crearElemento('li', {className: 'dropdown'}))
//                             .appendChild(crearElemento('div', {className: 'dropdown-button'}))
//                                 .appendChild(crearElemento('i', {className: 'fa-fa-search'}))
//                             .parentElement
//                         .parentElement
//                             .appendChild(crearElemento('div', {className: 'dropdown-content'}))
//                                 .appendChild(crearElemento('a', {href: 'busqueda.html'}))
//                                     .appendChild(document.createTextNode('Descubrir'))
//                                 .parentElement
//                             .parentElement
//                                 .appendChild(busquedaRapidaBloqueHTML)
//                             .parentElement
//                         .parentElement
//                     .parentElement
//                         .appendChild(crearElemento('li', {}))
//                             .appendChild(crearElemento('a', {href: '#'}))
//                                 .appendChild(crearElemento('i', {className: 'fa-fa-upload'}))
//                             .parentElement
//                         .parentElement
//                     .parentElement
//                 .parentElement
//             .parentElement
//         .parentElement
//             .appendChild(busquedaRapidaBloqueHTML)
//         .parentElement,
//         document.body.firstChild
//     );
// });

window.addEventListener('load', () => {
    const estilos = {
        'oscuro': 'Modo oscuro (predeterminado)',
        'claro': 'Modo claro',
        'alto-contraste': 'Modo de alto contraste',
        'letra-mayor': 'Modo de tipo de letra mayor',
        'letra-mayor-y-alto-contraste': 'Modo de letra mayor y alto contraste'
    };
    const select = $('busqueda-rapida').parentElement.appendChild(crearElemento('select', {}));
    for(const estilo in estilos) {
        select
            .appendChild(crearElemento('option', {value: estilo}))
                .appendChild(document.createTextNode(estilos[estilo]));
    }
})