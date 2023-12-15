<?php

use MVC\Enrutador;
use MVC\Controladores\Controlador;
use MVC\Controladores\ControladorIndex;
use MVC\Controladores\ControladorBusqueda;
use MVC\Controladores\ControladorUsuario;
use MVC\Controladores\ControladorAlbum;
use MVC\Controladores\ControladorFoto;

// --- GET ---
// index.php
Enrutador::agregarRutaMetodo('GET', '/', [ControladorIndex::class, 'index']);

// resultado.php
Enrutador::agregarRutaMetodo('POST', '/resultados', [ControladorIndex::class, 'resultado']);

// accesibilidad.php
Enrutador::agregarRutaMetodo('GET', '/accesibilidad', [Controlador::class, 'accesibilidad']);

// busqueda.php
Enrutador::agregarRutaMetodo('GET', '/busqueda', [ControladorBusqueda::class, 'busqueda']);

// configurar.php
Enrutador::agregarRutaMetodo('GET', '/usuario/estilos', [ControladorUsuario::class, 'configurar']);

// control-usuario.php
Enrutador::agregarRutaMetodo('GET', '/usuario/control', [ControladorUsuario::class, 'controlUsuario']);

// crear-album.php
Enrutador::agregarRutaMetodo('GET', '/album/crear', [ControladorAlbum::class, 'crearAlbum']);

// mis-albumes.php
Enrutador::agregarRutaMetodo('GET', '/album/mio', [ControladorAlbum::class, 'misAlbumes']);

// respuesta-album.php
Enrutador::agregarRutaMetodo('GET', '/album/respuesta', [ControladorAlbum::class, 'respuestaAlbum']);

// solicitar-album.php
Enrutador::agregarRutaMetodo('GET', '/album/solicitar', [ControladorAlbum::class, 'solicitarAlbum']);

// tabla-album.php
Enrutador::agregarRutaMetodo('GET', '/album/tabla', [ControladorAlbum::class, 'tablaAlbum']);

// detalle.php
Enrutador::agregarRutaMetodo('GET', '/foto/:id', [ControladorFoto::class, 'detalle']);

// publicar.php
Enrutador::agregarRutaMetodo('GET', '/foto/publicar', [ControladorFoto::class, 'publicar']);

// usuario.php
Enrutador::agregarRutaMetodo('GET', '/usuario', [ControladorUsuario::class, 'usuario']);

// mis-datos.php
Enrutador::agregarRutaMetodo('GET', '/usuario/datos', [ControladorUsuario::class, 'misDatos']);

// perfil-usuario.php
Enrutador::agregarRutaMetodo('GET', '/usuario/perfil', [ControladorUsuario::class, 'perfilUsuario']);

// registro.php
Enrutador::agregarRutaMetodo('GET', '/usuario/registro', [ControladorUsuario::class, 'registro']);

// respuesta-usuario.php
Enrutador::agregarRutaMetodo('GET', '/usuario/respuesta', [ControladorUsuario::class, 'respuestaUsuario']);

// --- POST ---

// --- PUT ---

// --- DELETE ---


// Final
Enrutador::despachar();
