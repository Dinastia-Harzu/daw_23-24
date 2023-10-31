let nombre_valido = false; 
let contrasenya_valida = false;
let contrasenya_rep_valida = false;
let correo_valido = false;
let fecha_valida = false;


// Pillamos los inputs del registro
window.addEventListener('load', () => {
    let nombre_input = document.getElementById('nombre');
    let contrasenya_input = document.getElementById('contraseña');
    let contrasenya_rep_input = document.getElementById('confirmar-contraseña');
    let correo_input = document.getElementById('correo');
    let fecha_input = document.getElementById('fecha-nacimiento');

    let boton_registro = document.getElementById('btn-registro');
// ---------- LISTENERS DE LOS INPUTS ---------------------
// NOMBRE
nombre_input.addEventListener('blur', () => {
    let nombre = nombre_input.value;
    nombre_valido = validarNombre(nombre);
    console.log(nombre_valido);

    // Mostramos mensaje
    if(!nombre_valido) ponerMensaje(0,"El nombre de usuario no es válido");
});

nombre_input.addEventListener('click', () => {
    borrarMensaje(nombre_input);
});

// CONTRASEÑA
contrasenya_input.addEventListener('blur', () => {
    let contrasenya = contrasenya_input.value;
    contrasenya_valida = validarContrasenya(contrasenya);
    console.log(contrasenya_valida);

    // Mostramos mensaje
    if(!contrasenya_valida) ponerMensaje(1,"Pon al menos una mayúscula, minúscula y número");
});

contrasenya_input.addEventListener('click', () => {
    borrarMensaje(contrasenya_input);
});

// REPETIR CONTRASEÑA
contrasenya_rep_input.addEventListener('blur', () => {
    let contrasenya = contrasenya_input.value;
    let contrasenya_rep = contrasenya_rep_input.value;

    // Hacemos la comprobacion 
    contrasenya_rep_valida = (contrasenya === contrasenya_rep);

    // Mostramos mensaje
    if(!contrasenya_rep_valida) ponerMensaje(2,"Repite lo que has puesto arriba");

    console.log(contrasenya_rep_valida);
});

contrasenya_rep_input.addEventListener('click', () => {
    borrarMensaje(contrasenya_rep_input);
});

// CORREO
correo_input.addEventListener('blur', () => {
    let correo = correo_input.value;
    correo_valido = validarCorreo(correo);
    console.log(correo_valido); 

    // Mostramos mensaje
    if(!correo_valido) ponerMensaje(3,"El formato debe ser parte-local@dominio");
});

correo_input.addEventListener('click', () => {
    borrarMensaje(correo_input);
});

// FECHA
fecha_input.addEventListener('blur', () => {
    let fecha = fecha_input.value;
    fecha_valida = validarFecha(fecha);
    console.log(fecha_valida); 

    // En este caso, el mensaje se muestra en el propio metodo de validacion, por haber varios mensajes
});

fecha_input.addEventListener('click', () => {
    borrarMensaje(fecha_input);
});

// ------------ EVENTO DEL BOTON REGISTRARSE --------------
boton_registro.addEventListener('click', function(event){

    console.log(nombre_valido+" "+contrasenya_valida+" "+contrasenya_rep_valida+" "+correo_valido+" "+fecha_valida);
    if(!(nombre_valido && contrasenya_valida && contrasenya_rep_valida && correo_valido && fecha_valida))
    event.preventDefault();
});

});

// FUNCIONES PARA VALIDAR LOS DATOS
// VALIDAR NOMBRE
function validarNombre(nom){
    // Comprobamos que sea cadena vacia
    if (nom === '') return false;                   

    // Comprobamos que solo sean espacios
    if (nom.trim().length === 0) return false; 
    
    // Comprobamos que la longitud es la adecuada
    if (nom.length < 3 || nom.length > 15) return false; 

    // Comprobamos que el primer caracter no sea un numero
    const primerCaracter = parseInt(nom[0]);
    if (!(isNaN(primerCaracter))) return false; 

    // Comprobamos que los caracteres sean del abecedario ingles o numeros
    const caracteresValidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    for (let i = 0; i < nom.length; i++) {
        if (caracteresValidos.indexOf(nom[i]) === -1) return false;   
    }

    // Si nada falla, devolvemos true porque el registro es valido
    return true;
}

// VALIDAR CONTRASEÑA
function validarContrasenya(con){
    // Comprobamos que sea cadena vacia
    if (con === '') return false;                   

    // Comprobamos que solo sean espacios
    if (con.trim().length === 0) return false; 
    
    // Comprobamos que la longitud es la adecuada
    if (con.length < 6 || con.length > 15) return false;

    // Comprobamos que los caracteres sean del abecedario ingles o numeros o los guiones
    const caracteresValidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-_";
    for (let i = 0; i < con.length; i++) {
        if (caracteresValidos.indexOf(con[i]) === -1) return false;   
    }

    // Comprobamos que al menos tenga una mayuscula, una minuscula y un numero
    let tieneMinuscula = false;
    let tieneMayuscula = false;
    let tieneNumero = false;

    for (let i = 0; i < con.length; i++) {
        const caracter = con.charCodeAt(i);
        if (caracter >= 48 && caracter <= 57) tieneNumero = true;
        else if (caracter >= 65 && caracter <= 90) tieneMayuscula = true;
        else if (caracter >= 97 && caracter <= 122) tieneMinuscula = true;
    }

    if (!tieneMinuscula || !tieneMayuscula || !tieneNumero) return false; 
      
    return true;
}

// VALIDAR CORREO
/**
 * 
 * @param {string} cor 
 * @returns 
 */
function validarCorreo(cor){
    // Comprobamos que tenga la longitud adecuada
    if(cor.length == 0 || cor.length > 254) return false;

    // Comprobamos que el correo tiene la estructura parte-local@dominio con split
    let partes_correo = cor.split('@');
    console.log(partes_correo);

    // Si no hay arroba o hay mas de una, el formato es valido
    if(partes_correo.length != 2) return false;

    // Comprobamos ambas partes del correo por separado
    // ------------------- Parte local -------------------------
    let local = partes_correo[0];

    // Comprobamos tamaño adecuado
    if(local.length == 0 || local.length > 64) return false;

    // Comprobamos que no tiene un punto al principio, al final o varias veces seguidas
    let partes_local = local.split('.');
    for (const subcadena of partes_local) {
        if(subcadena.length == 0) return false;
    }
    
    // Comprobamos que local tiene las letras bien
    const caracteresValidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-_!#$%&'*+/=?^`{|}~.";
    const subcaracteresValidos = caracteresValidos.substring(0, 63);

    for (let i = 0; i < local.length; i++) {
        if (caracteresValidos.indexOf(local[i]) === -1) return false;   
    }
    // -------------------------------------------------------
    // ------------------- Parte dominio ---------------------
    let dominio = partes_correo[1];

    // Comprobamos tamaño adecuado
    if(dominio.length == 0 || dominio.length > 255) return false;

    // Separamos los dominios en subdominios
    let partes_dominio = dominio.split('.');

    // Comprobamos que cada subdominio tiene la longitud adecuada, los caracteres adecuados y lo del guion
    for (const subdominio of partes_dominio) {

        // Longitud adecuada
        if(subdominio.length == 0 || subdominio.length > 63) return false;

        // Guion al principio o al final
        if(subdominio[0] == '-' || subdominio[subdominio.length - 1] == '-') return false;

        // Caracteres validos
        for (let i = 0; i < subdominio.length; i++) {
            if (subcaracteresValidos.indexOf(subdominio[i]) === -1) return false;   
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
    let partes_fecha = fec.split('/');

    // Comprobar que hay tres partes
    if(partes_fecha.length != 3){
        // Mostramos mensaje de formato erroneo
        if(!fecha_valida) ponerMensaje(5,"El formato debe ser dd/mm/yyyy");
        return false;
    }
    // Reordenar fecha y comprobar que es valida
    let fecha = partes_fecha.reverse().join('-');

    let fechaValida = Date.parse(fecha);
    if(isNaN(fechaValida)) return false;

    // Comprobamos si el usuario es mayor de edad
    if(new Date().getFullYear() - partes_fecha[0] < 18){
        // Mostramos mensaje de edad no permitida
        if(!fecha_valida) ponerMensaje(5,"Debes tener 18 años o más");
        return false;
    }
    return true;
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