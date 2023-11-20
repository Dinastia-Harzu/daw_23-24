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

/**
 * 
 * @param {string} cadena 
 */
function cambiarFormato(cadena) {
    const nuevaCadena = cadena.split('-');
    for(let i = 0; i < nuevaCadena.length; i++) {
        let palabra = nuevaCadena.shift();
        palabra = palabra.charAt(0).toUpperCase() + palabra.slice(1);
        nuevaCadena.push(palabra);
    }
    return nuevaCadena.join('');
}

function verificarCampoNombre(nombre) {
    return (
        nombre.length >= 3
        &&
        nombre.length <= 15
        &&
        isNaN(parseInt(nombre[0]))
        &&
        [...nombre].every(caracter => {
            return 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'.includes(caracter);
        })
    );
}

function verificarCampoContraseña(contraseña) {
    const caracteres_validos = [
        'abcdefghijklmnopqrstuvwxyz',
        'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
        '0123456789'
    ];
    contraseña = [...contraseña];
    return contraseña.length >= 6 && contraseña.length <= 15 && contraseña.every(caracter => caracteres_validos.join().concat('-_').includes(caracter)) && caracteres_validos.every(sub => contraseña.some(c => sub.includes(c)));
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
    const caracteresValidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-_!#$%&'*+/=?^`{|}~.";
    const subcaracteresValidos = caracteresValidos.substring(0, 63);
    const [local, dominio] = correo.split('@');

    return(
        local.length > 0 && local.length <= 64
        &&
        local.split('.').every(sub => sub.length > 0)
        &&
        [...local].every(caracter => caracteresValidos.includes(caracter))
        &&
        (dominio?.length ?? -1) > 0 && dominio.length <= 255
        &&
        dominio.split('.').every(sub => {
            return(
                sub.length > 0 && sub.length <= 63
                &&
                !sub.startsWith('-') && !sub.endsWith('-')
                &&
                [...sub].every(caracter => subcaracteresValidos.includes(caracter))
            );
        })
    );
}
