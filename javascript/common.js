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