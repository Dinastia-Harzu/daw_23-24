'use strict'

window.addEventListener('load', () => {
    const danger = 'omrs-input-danger';
    const helper = 'omrs-input-helper';
    $('tab-reg').addEventListener('submit', evt => {
        let enviarDatos = true;
        for(const [campo, valor] of new FormData(evt.target)) {
            const funcion = window['verificarCampo' + cambiarFormato(campo)];
            if(typeof funcion === 'undefined') {
                continue;
            }
            const div = $(campo).parentElement;
            const span = div.getElementsByClassName(helper)[0];
            if(funcion(valor)) {
                if(span) {
                    div.classList.remove(danger);
                    div.removeChild(span);
                }
            } else {
                enviarDatos = false;
                if(!span) {
                    div.classList.add(danger);
                    div.appendChild(crearElemento('span', {className: helper}))
                        .appendChild(document.createTextNode({
                            'nombre': 'El nombre de usuario no es válido',
                            'contraseña': 'La contraseña debe contener minúsculas, mayúsculas y números',
                            'confirmar-contraseña': 'Las contraseñas no coinciden',
                            'correo': 'El correo electrónico no es válido'
                        }[campo]));
                    }
            }
        }
        if(!enviarDatos) {
            evt.preventDefault();
        }
    });
});

function verificarCampoNombre(nombre) {
    // {2,14} en lugar de {3,15} porque el primer caracter se lo come [a-zA-Z]
    return /^[a-zA-Z][a-zA-Z0-9]{2,14}$/.test(nombre);
}

function verificarCampoContraseña(contraseña) {
    return /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z0-9-_]{6,15}$/.test(contraseña);
}

function verificarCampoConfirmarContraseña(contraseña_repetida) {
    return contraseña_repetida === $('contraseña').value;
}

/**
 * 
 * @param {string} correo 
 * @returns 
 */
function verificarCampoCorreo(correo) {
    return /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/.test(correo);
}
