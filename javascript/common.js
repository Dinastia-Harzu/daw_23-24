const estilos = {
    'oscuro': 'Modo oscuro (predeterminado)',
    'claro': 'Modo claro',
    'alto-contraste': 'Modo de alto contraste',
    'letra-mayor': 'Modo de tipo de letra mayor',
    'letra-mayor-y-alto-contraste': 'Modo de letra mayor y alto contraste'
};

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
    const select = $('busqueda-rapida').parentElement.appendChild(crearElemento('select', {}, 'change', evt => {
        const link = recogerEtiquetaLink();
        const estilo = evt.target.value;
        link.setAttribute('href', `css/modos-alternativos/${estilo}.css`);
        crearCookie('estilo', estilo, 45);
    }));
    for(const estilo in estilos) {
        select
            .appendChild(crearElemento('option', {value: estilo}))
                .appendChild(document.createTextNode(estilos[estilo]));
    }
    const cookie = pillarCookie('estilo');
    if(cookie.length > 0) {
        select.value = cookie;
        recogerEtiquetaLink().setAttribute('href', `css/modos-alternativos/${cookie}.css`);
    }
});

function recogerEtiquetaLink() {
    for(const estilo in estilos) {
        const etiqueta = document.querySelector(`link[href="css/modos-alternativos/${estilo}.css"]`);
        if(etiqueta) {
            return etiqueta;
        }
    }
    return null;
}

function crearCookie(nombre, valor, dias_caducidad) {
    document.cookie = `${nombre}=${valor}; expires=${new Date(Date.now() + dias_caducidad * 24 * 60 * 60 * 1000).toUTCString()};path=`;
}

function pillarCookie(nombre) {
    nombre += '=';
    const cookies = decodeURIComponent(document.cookie).split(';');
    for(const cookie of cookies) {
        const c = cookie.trimStart();
        if(c.startsWith(nombre)) {
            return c.substring(nombre.length, c.length);
        }
    }
    return "";
}
