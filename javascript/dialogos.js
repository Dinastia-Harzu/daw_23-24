'use strict'

function abrirDialogo(embeberHTML = () => {}, id) {
    const dialogo = document.createElement('dialog');
    dialogo.id = id;
    embeberHTML().forEach(elemento => {
        dialogo.appendChild(elemento);
    });

    // const parser = new DOMParser();
    // const fragment = document.createDocumentFragment();
    // parser.parseFromString(html, 'text/html');
    // dialogo.appendChild(fragment);

    document.body.appendChild(dialogo);
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

function mostrarDialogoLogin() {
    const elementos = [];
    const elementos_nivel = new Array(4);

    // > p.titulo-dialog
    elementos_nivel[0] = document.createElement('p');
    elementos_nivel[0].className = 'titulo-dialog';
    elementos_nivel[0].textContent = 'Iniciar sesión';
    elementos.push(elementos_nivel[0]);

    // > form
    elementos_nivel[0] = document.createElement('form');
    elementos_nivel[0].action = 'index.html';

    // > form > .omrs-input-group
    for(let i = 0; i < 2; i++) {
        elementos_nivel[1] = document.createElement('div');
        elementos_nivel[1].className = 'omrs-input-group';
        
        // > form > .omrs-input-group > label.omrs-input-filled
        elementos_nivel[2] = document.createElement('label');
        elementos_nivel[2].className = 'omrs-input-filled';

        // > form > .omrs-input-group > label.omrs-input-filled > input
        elementos_nivel[3] = document.createElement('input');
        elementos_nivel[3].type = 'text';
        elementos_nivel[3].placeholder = ' ';
        elementos_nivel[3].required = true;
        elementos_nivel[3].name = elementos_nivel[3].id = i == 0 ? 'nombre' : 'contraseña';
        elementos_nivel[2].appendChild(elementos_nivel[3]);
        
        // > form > .omrs-input-group > label.omrs-input-filled > span
        elementos_nivel[3] = document.createElement('span');
        elementos_nivel[3].className = 'omrs-input-label';
        elementos_nivel[3].textContent = `Introduce tu ${i == 0 ? 'nombre de usuario' : 'contraseña'}`;
        elementos_nivel[2].appendChild(elementos_nivel[3]);
        
        // > form > .omrs-input-group > label.omrs-input-filled > span
        // TODO: quizá aquí el texto informativo, pero vamos...

        elementos_nivel[1].appendChild(elementos_nivel[2]);

        elementos_nivel[0].appendChild(elementos_nivel[1]);
    }

    // > form > .campo-boton-submit
    elementos_nivel[1] = document.createElement('div');
    elementos_nivel[1].className = 'campo-boton-submit';

    // > form > .campo-boton-submit > button
    elementos_nivel[2] = document.createElement('button');
    elementos_nivel[2].type = 'submit';
    elementos_nivel[2].textContent = 'Registrarse';
    elementos_nivel[1].appendChild(elementos_nivel[2]);

    elementos_nivel[0].appendChild(elementos_nivel[1]);
    
    // TODO: quizá cambiar este <hr> por una regla de un estilo en CSS
    // > form > hr
    elementos_nivel[0].appendChild(document.createElement('hr'));

    // > form > p.text-google
    elementos_nivel[1] = document.createElement('p');
    elementos_nivel[1].className = 'text-google';
    elementos_nivel[1].textContent = '...o continúa con Google';
    elementos_nivel[0].appendChild(elementos_nivel[1]);

    // > form > a.google-login
    elementos_nivel[1] = document.createElement('a');
    elementos_nivel[1].className = 'google-login';
    // TODO: cambiar el href
    elementos_nivel[1].href = 'https://accounts.google.com'

    // > form > a.google-login > img
    elementos_nivel[2] = document.createElement('img');
    elementos_nivel[2].src = 'img/google.svg';
    elementos_nivel[2].alt = 'Icono de Google';
    elementos_nivel[1].appendChild(elementos_nivel[2]);
    
    // > form > a.google-login > p
    elementos_nivel[2] = document.createElement('p');
    elementos_nivel[2].textContent = 'Inicia sesión con Google';
    elementos_nivel[1].appendChild(elementos_nivel[2]);

    elementos_nivel[0].appendChild(elementos_nivel[1]);

    // TODO: quizá cambiar este <hr> por una regla de un estilo en CSS
    // > form > hr
    elementos_nivel[0].appendChild(document.createElement('hr'));

    // > form > p.text-google
    elementos_nivel[1] = document.createElement('p');
    elementos_nivel[1].className = 'text-google';
    elementos_nivel[1].textContent = 'No tienes una cuenta? ';

    // > form > p.text-google > a
    elementos_nivel[2] = document.createElement('a');
    elementos_nivel[2].href = 'registro.html';
    elementos_nivel[2].textContent = 'Regístrate';
    elementos_nivel[1].appendChild(elementos_nivel[2]);

    elementos_nivel[0].appendChild(elementos_nivel[1]);

    elementos.push(elementos_nivel[0]);

    // p.enlace-simple
    elementos_nivel[0] = document.createElement('p');
    elementos_nivel[0].className = 'enlace-simple';
    elementos_nivel[0].textContent = 'Volver';
    elementos_nivel[0].addEventListener('click', () => cerrarDialogo());
    elementos.push(elementos_nivel[0]);

    return elementos;


    // abrirDialogo(`
    //     <p class="titulo-dialog">Iniciar sesión</p>
    //     <form action="index.html">
    //         <div class="omrs-input-group">
    //             <label class="omrs-input-filled">
    //                 <input type="text" placeholder=" " required id="nombre" name="nombre">
    //                 <span class="omrs-input-label">Introduce tu nombre de usuario</span>
    //             </label>
    //         </div>
    //         <div class="omrs-input-group">
    //             <label class="omrs-input-filled">
    //                 <input type="text" placeholder=" " required id="contraseña" name="contraseña">
    //                 <span class="omrs-input-label">Introduce tu contraseña</span>
    //             </label>
    //         </div>
    //         <div class="campo-boton-submit">
    //             <button type="submit">Registrarse</button>
    //         </div>
    //         <hr>
    //         <p class="text-google">...o continúa con Google</p>
    //         <a href="https://accounts.google.com" class="google-login">
    //             <img src="img/google.svg" alt="Icono de Google">
    //             <p>"Inicia sesión con Google"</p>
    //         </a>
    //         <hr>
    //         <p class="text-google">No tienes una cuenta? <a href="registro.html">Regístrate</a></p>
    //     </form>
    //     <p class="enlace-simple">Volver</p>
    // `);
}

function mostrarDialogoError() {
    const elementos = [];
    const elementos_nivel = new Array(3);

    // > img
    elementos_nivel[0] = document.createElement('img');
    elementos_nivel[0].src = 'img/advertencia.svg';
    elementos_nivel[0].alt = 'Advertencia';
    elementos.push(elementos_nivel[0]);

    // > p.titulo-dialog
    elementos_nivel[0] = document.createElement('p');
    elementos_nivel[0].className = 'titulo-dialog';
    elementos_nivel[0].textContent = 'Inicia sesión o regístrate para poder ver las fotografías en todo su esplendor';
    elementos.push(elementos_nivel[0]);

    // > ul
    elementos_nivel[0] = document.createElement('ul');

    // > ul > li[0]
    elementos_nivel[1] = document.createElement('li');
    elementos_nivel[1].textContent = 'Iniciar sesión';
    elementos_nivel[1].addEventListener('click', () => {
        abrirDialogo(mostrarDialogoLogin, 'login');
        cerrarDialogo();
    });
    elementos_nivel[0].appendChild(elementos_nivel[1]);

    // > ul > li[1]
    elementos_nivel[1] = document.createElement('li');

    // > ul > li[1] > a
    elementos_nivel[2] = document.createElement('a');
    elementos_nivel[2].href = 'registro.html';
    elementos_nivel[2].textContent = 'Registrarse';
    elementos_nivel[1].appendChild(elementos_nivel[2]);

    elementos_nivel[0].appendChild(elementos_nivel[1]);

    elementos.push(elementos_nivel[0]);

    // > p
    elementos_nivel[0] = document.createElement('p');
    elementos_nivel[0].textContent = 'Volver';
    elementos_nivel[0].addEventListener('click', () => cerrarDialogo());
    elementos.push(elementos_nivel[0]);

    return elementos;
}