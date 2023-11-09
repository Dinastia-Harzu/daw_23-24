<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Título imagen - Masthermatika</title>
    <link rel="stylesheet" href="css/global/style.css">
    <link rel="stylesheet" href="css/ordenador/style.css">
    <link rel="stylesheet" href="css/tablet/style.css">
    <link rel="stylesheet" href="css/movil/style.css">
    <link rel="stylesheet" href="css/global/detalle.css">
    <link rel="stylesheet" href="css/ordenador/detalle.css">
    <link rel="stylesheet" href="css/tablet/detalle.css">
    <link rel="stylesheet" href="css/movil/detalle.css">
    <link rel="alternate stylesheet" href="css/modos-alternativos/oscuro.css" title="Modo oscuro (predeterminado)">
    <link rel="alternate stylesheet" href="css/modos-alternativos/claro.css" title="Modo claro">
    <link rel="alternate stylesheet" href="css/modos-alternativos/alto-contraste.css" title="Modo de alto contraste">
    <link rel="alternate stylesheet" href="css/modos-alternativos/letra-mayor.css" title="Modo de tipo de letra mayor">
    <link rel="alternate stylesheet" href="css/modos-alternativos/letra-mayor-y-alto-contraste.css" title="Modo de letra mayor y alto contraste">
    <link rel="stylesheet" href="css/impresion/style.css" media="print">
    <link rel="stylesheet" href="css/impresion/detalle.css" media="print">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <header>
        <aside>
            <figure>
                <img src="img/logo-y-nombre.png" alt="Logo, nombre y subtítulo de la página: Masthermatika" id="logo">
            </figure>
            <nav>
                <ul id="nav-texto">
                    <li>
                        <a href="index.html">Inicio</a>
                    </li>
                    <li>
                        <a href="busqueda.html">Descubrir</a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">Publicar</a>
                    </li>
                </ul>
                <ul id="nav-iconos">
                    <li>
                        <a href="index.html"><i class="fa fa-home"></i></a>
                    </li>
                    <li class="dropdown">
                        <div class="dropdown-button"><i class="fa fa-search"></i></div>
                        <div class="dropdown-content">
                            <a href="busqueda.html">Descubrir</a>
                            <form action="resultado.html">
                                <input type="text" name="busqueda-rapida" placeholder="Búsqueda rápida">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </li>
                    <li>
                        <a href="javascript:void(0);"><i class="fa fa-upload"></i></a>
                    </li>
                </ul>
            </nav>
        </aside>
        <form action="resultado.html" id="busqueda-rapida">
            <input type="text" name="busqueda-rapida" placeholder="Búsqueda rápida">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
        <figure>
            <a href="usuario.html">
                <img src="img/placeholder.png" alt="Foto de perfil del usuario">
            </a>
        </figure>
    </header>
    <figure>
        <img src="img/logo-y-nombre.png" alt="Logo, nombre y subtítulo de la página: Masthermatika">
    </figure>
    <main>
<?php
    if($_GET["id"]%2 != 0) {
        echo <<<hereDOC
            <section id="foto">
                    <img src="img/foto1.png" alt="Foto matemática">
                    <section id="info-foto">
                        <h1>Función tridimensional en espacio cartesiano</h1>
                        <p>Publicado en <time>2023</time></p>
                        <p>España</p>
                        <p>Cosas de matemáticas que me molan</p>
                        <p>Genio_de_la_programacion11</p>
                    </section>
                </section>
            </main>
        hereDOC;
    }
    else {
        echo <<<hereDOC
            <section id="foto">
                    <img src="img/foto2.png" alt="Foto matemática">
                    <section id="info-foto">
                        <h1>Ilustración de un hipercubo azulado</h1>
                        <p>Publicado en <time>2023</time></p>
                        <p>España</p>
                        <p>Geometría hasta en la sopa</p>
                        <p>Amante_de_los_Cubos47</p>
                    </section>
                </section>
            </main>
        hereDOC;
}
  
?>
    <footer>
        <p>DAW <time>2023</time> - Ingeniería Multimedia - Escuela Politécnica Superior - Universidad de Alicante</p>
        <p>Copyright &copy; 2023 por Marta Gómez Verdú y Arturo García Richardson</p>
        <p class="enlace-simple">
            <a href="accesibilidad.html">Declaración de accesibilidad</a>
        </p>
    </footer>
</body>
</html>