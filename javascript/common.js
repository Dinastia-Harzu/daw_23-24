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

window.addEventListener('load', () => {
    const estilos = {
        'oscuro': 'Modo oscuro (predeterminado)',
        'claro': 'Modo claro',
        'alto-contraste': 'Modo de alto contraste',
        'letra-mayor': 'Modo de tipo de letra mayor',
        'letra-mayor-y-alto-contraste': 'Modo de letra mayor y alto contraste'
    };
    const select = $('busqueda-rapida').parentElement.appendChild(crearElemento('select', {}, 'change', evt => {
        const link = (() => {
            for(const estilo in estilos) {
                const etiqueta = document.querySelector(`link[href="css/modos-alternativos/${estilo}.css"]`);
                if(etiqueta) {
                    return etiqueta;
                }
            }
            return null;
        })();
        const estilo = evt.target.value;
        link.setAttribute('href', `css/modos-alternativos/${estilo}.css`);
    }));
    for(const estilo in estilos) {
        select
            .appendChild(crearElemento('option', {value: estilo}))
                .appendChild(document.createTextNode(estilos[estilo]));
    }
})