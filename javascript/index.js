window.addEventListener('load', () => {
    // Pilla el primero, que es el que quiero
    const opcion_login = document.querySelector('#tab-login > ul > li');
    opcion_login.addEventListener('click', () => abrirDialogo(mostrarDialogoLogin, 'login'));

    const articulos = document.querySelectorAll('.grid-img article');
    articulos.forEach(articulo => {
        articulo.addEventListener('click', () => abrirDialogo(mostrarDialogoError, 'error'));
    });

    [].slice.call(document.getElementsByTagName('dialog')).forEach(() => {
        const botonCancelar = document.querySelector(`dialog .enlace-simple`);
        botonCancelar.addEventListener('click', () => cerrarDialogo());
    });
});