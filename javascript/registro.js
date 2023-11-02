// Pillamos los inputs del registro
window.addEventListener('load', () => {
    const nombre_input = document.getElementById('nombre');
    const contrasenya_input = document.getElementById('contraseña');
    const contrasenya_rep_input = document.getElementById('confirmar-contraseña');
    const correo_input = document.getElementById('correo');
    const fecha_input = document.getElementById('fecha-nacimiento');

    // ---------- VALIDAMOS LOS DATOS DEL REGISTRO ---------------------
    nombre_input.addEventListener('blur', () => {
        const nombre_valido = validarNombre(nombre_input.value);
        console.log(nombre_valido);
    });

    contrasenya_input.addEventListener('blur', () => {
        const contrasenya_valida = validarContrasenya(contrasenya_input.value);
        console.log(contrasenya_valida);
    });

    contrasenya_rep_input.addEventListener('blur', () => {
        const contrasenya = contrasenya_input.value;
        const contrasenya_rep = contrasenya_rep_input.value;

        // Hacemos la comprobacion 
        const contrasenya_rep_valida = (contrasenya === contrasenya_rep);
        console.log(contrasenya_rep_valida);
    });

    correo_input.addEventListener('blur', () => {
        const correo_valido = validarCorreo(correo_input.value);
        console.log(correo_valido); 
    });

    fecha_input.addEventListener('blur', () => {
        const fecha_valida = validarFecha(fecha_input.value);
        console.log(fecha_valida); 
    });

    document.querySelector('#tab-google > p.enlace-simple').addEventListener('click', () => console.log(input({
        value: 'MyValue',
        placeholder: 'MyPlaceholder',
        name: 'MyName',
        title: 'MyTitle',
        className: 'MyClass',
        list: 'browsers',
        type: 'search',
        pattern: '[a-z]+',
        required: true,
        autocomplete: 'off'
    })));
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
    if(partes_fecha.length != 3) {
        return false;
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