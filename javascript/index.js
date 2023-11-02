window.addEventListener('load', () => {
    // Pilla el primero, que es el que quiero
    const opcion_login = document.querySelector('#tab-login > ul > li');
    opcion_login.addEventListener('click', () => abrirDialogo(crearDialogoLogin));

    const articulos = document.querySelectorAll('.grid-img article');
    articulos.forEach(articulo => {
        articulo.addEventListener('click', () => abrirDialogo(crearDialogoError));
    });
});