<?php

use MVC\Enrutador;
use MVC\Controladores\Controlador;
use MVC\Controladores\ControladorIndex;
use MVC\Controladores\ControladorBusqueda;
use MVC\Controladores\ControladorEstilos;
use MVC\Controladores\ControladorUsuario;
use MVC\Controladores\ControladorAlbum;
use MVC\Controladores\ControladorFoto;

// index.php
Enrutador::agregarRutaMetodo('GET', '/', [ControladorIndex::class, 'index']);

// accesibilidad.php
Enrutador::agregarRutaMetodo('GET', '/accesibilidad', [Controlador::class, 'accesibilidad']);

// busqueda.php
Enrutador::agregarRutaMetodo('GET', '/busqueda', [ControladorBusqueda::class, 'busqueda']);

// configurar.php
Enrutador::agregarRutaMetodo('GET', '/estilos', [ControladorEstilos::class, 'configurar']);

// control-usuario.php
Enrutador::agregarRutaMetodo('GET', '/usuario/control', [ControladorUsuario::class, 'controlUsuario']);

// crear-album.php
Enrutador::agregarRutaMetodo('GET', '/album/crear', [ControladorAlbum::class, 'crearAlbum']);

// detalle.php
Enrutador::agregarRutaMetodo('GET', '/foto/:id', [ControladorFoto::class, 'detalle']);

// mis-albumes.php
Enrutador::agregarRutaMetodo('GET', '/album/mio', [ControladorAlbum::class, 'misAlbumes']);

// mis-datos.php
Enrutador::agregarRutaMetodo('GET', '/usuario/datos', [ControladorUsuario::class, 'misDatos']);

// perfil-usuario.php
Enrutador::agregarRutaMetodo('GET', '/usuario/perfil', [ControladorUsuario::class, 'perfilUsuario']);

// publicar.php
Enrutador::agregarRutaMetodo('GET', '/foto/publicar', [ControladorFoto::class, 'publicar']);

// registro.php
Enrutador::agregarRutaMetodo('GET', '/usuario/registro', [ControladorUsuario::class, 'registro']);

// respuesta-album.php
Enrutador::agregarRutaMetodo('GET', '/album/respuesta', [ControladorAlbum::class, 'respuestaAlbum']);

// respuesta-usuario.php
Enrutador::agregarRutaMetodo('GET', '/usuario/respuesta', [ControladorUsuario::class, 'respuestaUsuario']);

// resultado.php
Enrutador::agregarRutaMetodo('GET', '/resultados', [ControladorIndex::class, 'respuesta']);

// solicitar-album.php
Enrutador::agregarRutaMetodo('GET', '/album/solicitar', [ControladorAlbum::class, 'solicitarAlbum']);

// tabla-album.php
Enrutador::agregarRutaMetodo('GET', '/album/tabla', [ControladorAlbum::class, 'tablaAlbum']);

// usuario.php
Enrutador::agregarRutaMetodo('GET', '/usuario', [ControladorUsuario::class, 'usuario']);

Enrutador::despachar();
