'use strict'

function abrirDialogo(crearDialogo = () => console.error('No se puede abrir un diálogo si no se especifica el método creador.')) {
    const dialogo = crearDialogo();
    dialogo.showModal();
    dialogo.addEventListener('keydown', evt => {
        if(evt.key == 'Escape') {
            evt.preventDefault();
        }
    });
}

function cerrarDialogo() {
    const dialogo = document.querySelector('dialog');
    dialogo.close();
    dialogo.remove();
}

function crearDialogoLogin() {
    return document.body
        .appendChild(crearElemento('dialog', {id: 'login'}))
            .appendChild(crearElemento('p', {className: 'titulo-dialog'}))
                .appendChild(document.createTextNode('Iniciar sesión'))
            .parentElement
        .parentElement
            .appendChild(crearElemento('form', {action: 'index.php'}, 'submit', evt => {
                for(const campo of new FormData(evt.target)) {
                    if(campo[1].trim().length == 0) {
                        evt.preventDefault();
                        alert('Al menos un campo está vacío, escribe algo en ambos campos.');
                        return;
                    }
                }
            }))
                .appendChild(crearElemento('div', {className: 'omrs-input-group'}))
                    .appendChild(crearElemento('label', {className: 'omrs-input-filled'}))
                        .appendChild(crearElemento('input', {type: 'text', placeholder: ' ', id: 'nombre', name: 'nombre'}))
                    .parentElement
                        .appendChild(crearElemento('span', {className: 'omrs-input-label'}))
                            .appendChild(document.createTextNode('Introduce tu nombre de usuario'))
                        .parentElement
                    .parentElement
                .parentElement
            .parentElement
                .appendChild(crearElemento('div', {className: 'omrs-input-group'}))
                    .appendChild(crearElemento('label', {className: 'omrs-input-filled'}))
                        .appendChild(crearElemento('input', {type: 'password', placeholder: ' ', id: 'contraseña', name: 'contraseña'}))
                    .parentElement
                        .appendChild(crearElemento('span', {className: 'omrs-input-label'}))
                            .appendChild(document.createTextNode('Introduce tu contraseña'))
                        .parentElement
                    .parentElement
                .parentElement
            .parentElement
                .appendChild(crearElemento('div', {className: 'campo-boton-submit'}))
                    .appendChild(crearElemento('button', {type: 'submit'}))
                        .appendChild(document.createTextNode('Registrarse'))
                    .parentElement
                .parentElement
            .parentElement
                .appendChild(crearElemento('hr', {}))
            .parentElement
                .appendChild(crearElemento('p', {className: 'text-google'}))
                    .appendChild(document.createTextNode('...o continúa con Google'))
                .parentElement
            .parentElement
                .appendChild(crearElemento('a', {href: 'https://accounts.google.com', className: 'google-login'}))
                    .appendChild(crearElemento('img', {src: 'img/google.svg', alt: 'Icono de Google'}))
                .parentElement
                    .appendChild(crearElemento('p', {}))
                        .appendChild(document.createTextNode('Inicia sesión con Google'))
                    .parentElement
                .parentElement
            .parentElement
                .appendChild(crearElemento('hr', {}))
            .parentElement
                .appendChild(crearElemento('p', {className: 'text-google'}))
                    .appendChild(document.createTextNode('¿No tienes cuenta? '))
                .parentElement
                    .appendChild(crearElemento('a', {href: 'registro.php'}))
                        .appendChild(document.createTextNode('Regístrate'))
                    .parentElement
                .parentElement
            .parentElement
        .parentElement
            .appendChild(crearElemento('p', {className: 'enlace-simple'}, 'click', cerrarDialogo))
                .appendChild(document.createTextNode('Volver'))
            .parentElement
        .parentElement;
}

function crearDialogoError() {
    return document.body
        .appendChild(crearElemento('dialog', {id: 'error'}))
            .appendChild(crearElemento('img', {src: 'img/advertencia.svg', alt: 'Advertencia'}))
        .parentElement
            .appendChild(crearElemento('p', {className: 'titulo-dialog'}))
                .appendChild(document.createTextNode('Inicia sesión o regístrate para poder ver las fotografías en todo su esplendor'))
            .parentElement
        .parentElement
            .appendChild(crearElemento('ul', {}))
                .appendChild(crearElemento('li', {}, 'click', () => {
                    cerrarDialogo();
                    abrirDialogo(crearDialogoLogin);
                }))
                    .appendChild(document.createTextNode('Iniciar sesión'))
                .parentElement
            .parentElement
                .appendChild(crearElemento('li', {}))
                    .appendChild(crearElemento('a', {href: 'registro.php'}))
                        .appendChild(document.createTextNode('Registrarse'))
                    .parentElement
                .parentElement
            .parentElement
        .parentElement
            .appendChild(crearElemento('p', {className: 'enlace-simple'}, 'click', cerrarDialogo))
                .appendChild(document.createTextNode('Volver'))
            .parentElement
        .parentElement;
}