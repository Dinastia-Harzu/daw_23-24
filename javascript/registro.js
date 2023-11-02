// Pillamos los inputs del registro
window.addEventListener('load', () => {
    const campos_validos = [false, false, false, false];
    const nombre_input = $('nombre');
    const contrasenya_input = $('contraseña');
    const contrasenya_rep_input = $('confirmar-contraseña');
    const correo_input = $('correo');
    const fecha_input = $('fecha-nacimiento');

        let boton_registro = document.getElementById('btn-registro');
// ---------- LISTENERS DE LOS INPUTS ---------------------
    // NOMBRE
nombre_input.addEventListener('blur', () => {
        campos_validos[0] = validarNombre(nombre_input.value);
        console.log(campos_validos[0]);
    
    // Mostramos mensaje
    if(!nombre_valido) ponerMensaje(0,"El nombre de usuario no es válido");
});

nombre_input.addEventListener('click', () => {
    borrarMensaje(nombre_input);
});

contrasenya_input.addEventListener('blur', () => {
    let contrasenya = contrasenya_input.value;
    contrasenya_valida = validarContrasenya(contrasenya);
    console.log(contrasenya_valida);
});

    // REPETIR CONTRASEÑA
contrasenya_rep_input.addEventListener('blur', () => {
        campos_validos[1] = contrasenya_input.value === contrasenya_rep_input.value;
    
    // Mostramos mensaje
    if(!contrasenya_rep_valida) ponerMensaje(2,"Repite lo que has puesto arriba");

    console.log(campos_validos[1]);
    });

    contrasenya_rep_input.addEventListener('click', () => {
    borrarMensaje(contrasenya_rep_input);
});

// CORREO
correo_input.addEventListener('blur', () => {
        campos_validos[2] = validarCorreo(correo_input.value);
        console.log(campos_validos[2]); 
    
    // Mostramos mensaje
    if(!correo_valido) ponerMensaje(3,"El formato debe ser parte-local@dominio");
});

correo_input.addEventListener('click', () => {
    borrarMensaje(correo_input);
});

    fecha_input.addEventListener('blur', () => {
        campos_validos[3] = validarFecha(fecha_input.value);
        console.log(campos_validos[3]); 
    });

    $('tab-reg').addEventListener('submit', evt => {
        if(campos_validos.some(valido => !valido)) {
            evt.preventDefault();
        }
    })

    document.querySelector('#tab-google > p.enlace-simple').addEventListener('click', () => abrirDialogo(crearDialogoLogin));
});

// FUNCIONES PARA VALIDAR LOS DATOS
// VALIDAR NOMBRE
function validarNombre(nom) {
    return nom.length >= 3 && nom.length <= 15 && isNaN(parseInt(nom[0])) && [...nom].every(caracter => existeCaracter('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789', caracter));
}

// VALIDAR CONTRASEÑA
function validarContrasenya(con) {
    const caracteres_validos = [
        'abcdefghijklmnopqrstuvwxyz',
        'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
        '0123456789'
    ];
    con = [...con];
    return con.length >= 6 && con.length <= 15 && con.every(caracter => caracteres_validos.join().concat('-_').includes(caracter)) && caracteres_validos.every(sub => con.some(c => sub.includes(c)));
}

// VALIDAR CORREO
/**
 * 
 * @param {string} cor 
 * @returns 
 */
function validarCorreo(cor){
    // Comprobamos que tenga la longitud adecuada
    if(cor.length == 0 || cor.length > 254) {
        return false;
    }

    // Comprobamos que el correo tiene la estructura parte-local@dominio con split
    const partes_correo = cor.split('@');

    // Si no hay arroba o hay mas de una, el formato es valido
    if(partes_correo.length != 2) {
        return false;
    }

    // Comprobamos ambas partes del correo por separado
    const [local, dominio] = partes_correo;

    // -------------------------------------------------------
    // ------------------- Parte local -----------------------
    // Comprobamos tamaño adecuado
    if(local.length == 0 || local.length > 64) {
        return false;
    }

    // Comprobamos que no tiene un punto al principio, al final o varias veces seguidas
    const partes_local = local.split('.');
    for (const subcadena of partes_local) {
        if(subcadena.length == 0) {
            return false;
        }
    }
    
    // Comprobamos que local tiene las letras bien
    const caracteresValidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-_!#$%&'*+/=?^`{|}~.";
    const subcaracteresValidos = caracteresValidos.substring(0, 63);

    for(const element of local) {
        if(caracteresValidos.indexOf(element) == -1) {
            return false;
        }   
    }
    // -------------------------------------------------------
    // ------------------- Parte dominio ---------------------
    // Comprobamos tamaño adecuado
    if(dominio.length == 0 || dominio.length > 255) {
        return false;
    }

    // Separamos los dominios en subdominios
    const partes_dominio = dominio.split('.');

    // Comprobamos que cada subdominio tiene la longitud adecuada, los caracteres adecuados y lo del guion
    for(const subdominio of partes_dominio) {

        // Longitud adecuada
        if(subdominio.length == 0 || subdominio.length > 63) {
            return false;
        }

        // Guion al principio o al final
        if(subdominio.startsWith('-') || subdominio.endsWith('-')) {
            return false;
        }

        // Caracteres validos
        for(const element of subdominio) {
            if(subcaracteresValidos.indexOf(element) == -1) {
                return false;
            }
        }
    }
    // -------------------------------------------------------

    return true;
}

// VALIDAR FECHA
/**
 * 
 * @param {string} fec 
 * @returns 
 */
function validarFecha(fec){
    const partes_fecha = fec.split('/');

    // Comprobar que hay tres partes
    if(partes_fecha.length != 3){
        // Mostramos mensaje de formato erroneo
        if(!fecha_valida) ponerMensaje(5,"El formato debe ser dd/mm/yyyy");
        {
        return false;
    }
    }
    // Reordenar fecha y comprobar que es valida
    const fecha = partes_fecha.toReversed().join('-');

    if(isNaN(Date.parse(fecha))) {
        return false;
    }

    // Comprobamos si el usuario es mayor de edad
    return new Date().getFullYear() - partes_fecha[2] >= 18;
}

function existeCaracter(cadena, caracter) {
    return cadena.indexOf(caracter) != -1;
}


// -------------- FUNCION PARA PONER UN MENSAJE ABAJO DEL INPUT ------------
/**
 * 
 * @param {int} index 
 * @param {string} contenido 
 */
function ponerMensaje(index, contenido){
    // Pillamos el div de la clase dependiendo del index
    let label = document.getElementsByClassName('omrs-input-filled')[index];
    // console.log(label);

    // Creamos un span con la clase y lo ponemos debajo del label
    let mensaje = document.createElement('span');
    mensaje.className = 'omrs-input-helper';
    mensaje.textContent = contenido;

    label.appendChild(mensaje);
}

// BORRAR MENSAJE
function borrarMensaje(input){
    let parentLabel = input.parentElement;
    let mensaje = parentLabel.getElementsByClassName('omrs-input-helper');
    if(mensaje.length != 0) mensaje[0].remove();
}