let nombre_valido = false; 
let contrasenya_valida = false;
let contrasenya_rep_valida = false;
let correo_valido = false;

// Pillamos los inputs del registro
window.addEventListener('load', () => {
    let nombre_input = document.getElementById('nombre');
    let contrasenya_input = document.getElementById('contraseña');
    let contrasenya_rep_input = document.getElementById('confirmar-contraseña');
    let correo_input = document.getElementById('correo');

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

    return true;
}