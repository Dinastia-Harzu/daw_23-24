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

// ---------- VALIDAMOS LOS DATOS DEL REGISTRO ---------------------
nombre_input.addEventListener('blur', () => {
    let nombre = nombre_input.value;
    nombre_valido = validarNombre(nombre);
    console.log(nombre_valido);
});

contrasenya_input.addEventListener('blur', () => {
    let contrasenya = contrasenya_input.value;
    contrasenya_valida = validarContrasenya(contrasenya);
    console.log(contrasenya_valida);
});

contrasenya_rep_input.addEventListener('blur', () => {
    let contrasenya = contrasenya_input.value;
    let contrasenya_rep = contrasenya_rep_input.value;

    // Hacemos la comprobacion 
    contrasenya_rep_valida = (contrasenya === contrasenya_rep);
    console.log(contrasenya_rep_valida);
});

correo_input.addEventListener('blur', () => {
    let correo = correo_input.value;
    correo_valido = validarCorreo(correo);
    console.log(correo_valido); 
});

fecha_input.addEventListener('blur', () => {
    let fecha = fecha_input.value;
    fecha_valida = validarFecha(fecha);
    console.log(fecha); 
    console.log(fecha_valida); 
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
function validarFecha(fec){
    return true;
}