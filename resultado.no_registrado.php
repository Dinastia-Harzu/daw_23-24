<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masthermatika</title>
    <link rel="stylesheet" href="css/global/style.css">
    <link rel="stylesheet" href="css/ordenador/style.css">
    <link rel="stylesheet" href="css/tablet/style.css">
    <link rel="stylesheet" href="css/movil/style.css">
    <link rel="stylesheet" href="css/global/resultado.css">
    <link rel="stylesheet" href="css/ordenador/resultado.css">
    <link rel="stylesheet" href="css/tablet/resultado.css">
    <link rel="stylesheet" href="css/movil/resultado.css">
    <link rel="alternate stylesheet" href="css/modos-alternativos/oscuro.css" title="Modo oscuro (predeterminado)">
    <link rel="alternate stylesheet" href="css/modos-alternativos/claro.css" title="Modo claro">
    <link rel="alternate stylesheet" href="css/modos-alternativos/alto-contraste.css" title="Modo de alto contraste">
    <link rel="alternate stylesheet" href="css/modos-alternativos/letra-mayor.css" title="Modo de tipo de letra mayor">
    <link rel="alternate stylesheet" href="css/modos-alternativos/letra-mayor-y-alto-contraste.css" title="Modo de letra mayor y alto contraste">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php
    include_once "inc/header.php";
?>
    <main>
        <div class="tab-busc">
            <p>
                <label for="titulo">Título:</label> 
                <input type="text" name="titulo" id="titulo" placeholder="Introduce el título">
            </p>
            <p>
                <label for="fecha_d" class="tab-busc-fecha">Fecha entre:</label>
                <input type="date" name="fecha_d" id="fecha_d">

                <label for="fecha_h">y</label>
                <input type="date" name="fecha_h" id="fecha_h">
            </p>
            <p>
                <label for="paises">País:</label>
                <select name="paises" id="paises">
                    <option value="cod_al">Alemania</option>
                    <option value="cod_bel">Bélgica</option>
                    <option value="cod_chi">China</option>
                    <option value="cod_es">España</option>
                    <option value="cod_usa">Estados Unidos</option>
                    <option value="cod_fr">Francia</option>
                    <option value="cod_it">Italia</option>
                    <option value="cod_pol">Polonia</option>
                    <option value="cod_uk">Reino Unido</option>
                    <option value="cod_sui">Suiza</option>
                </select>
            </p>
        </div>
        <h1 class="titulo-index">Resultados</h1>
        <div class="grid-img">
            <article>
                <!-- Este <a> se esfumará cuando lleguemos a JS -->
                <a href="#error">
                    <img src="img/foto1.png" alt="Última foto #1">
                </a>
            </article>
            <article>
                <!-- Este <a> se esfumará cuando lleguemos a JS -->
                <a href="#error">
                    <img src="img/foto2.png" alt="Última foto #2">
                </a>
            </article>
            <article>
                <!-- Este <a> se esfumará cuando lleguemos a JS -->
                <a href="#error">
                    <img src="img/foto3.png" alt="Última foto #3">
                </a>
            </article>
            <article>
                <!-- Este <a> se esfumará cuando lleguemos a JS -->
                <a href="#error">
                    <img src="img/foto4.png" alt="Última foto #4">
                </a>
            </article>
            <article>
                <!-- Este <a> se esfumará cuando lleguemos a JS -->
                <a href="#error">
                    <img src="img/foto5.png" alt="Última foto #5">
                </a>
            </article>
        </div>
    </main>
<?php
    include_once "inc/footer.php";
?>
    <dialog open id="login">
        <p class="titulo_dialog">Iniciar sesión</p>
        <form action="index.php">
            <p>
                <label for="user">Usuario:</label>
                <input type="text" id="user" placeholder="Introduce tu nombre de usuario">
            </p>
            <p>
                <label for="pass">Contraseña:</label>
                <input type="password" id="pass" placeholder="Introduce tu contraseña">
            </p>
            <p>
                <input type="submit" value="Iniciar sesión">
            </p>
            <hr>
            <p class="text-google">...o continúa con Google</p>
            <a href="https://accounts.google.com" class="google-login">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" class="l">
                    <g fill-rule="evenodd" clip-rule="evenodd">
                        <path d="M20.64 12.2c0-.63-.06-1.25-.16-1.84H12v3.49h4.84a4.14 4.14 0 0 1-1.8 2.71v2.26h2.92a8.78 8.78 0 0 0 2.68-6.61z" fill="#4285F4"></path><path d="M12 21a8.6 8.6 0 0 0 5.96-2.18l-2.91-2.26a5.41 5.41 0 0 1-8.09-2.85h-3v2.33A9 9 0 0 0 12 21z" fill="#34A853"></path><path d="M6.96 13.71a5.41 5.41 0 0 1 0-3.42V7.96h-3a9 9 0 0 0 0 8.08l3-2.33z" fill="#FBBC05"></path><path d="M12 6.58c1.32 0 2.5.45 3.44 1.35l2.58-2.58A9 9 0 0 0 3.96 7.96l3 2.33A5.36 5.36 0 0 1 12 6.6z" fill="#EA4335"></path>
                    </g>
                </svg>
                Inicia sesión con Google
            </a>
            <hr>
            <p class="text-google">No tienes una cuenta? <a href="registro.php">Regístrate</a></p>
        </form>
    </dialog>

    <!-- ESTO ESTÁ FATAL, BORRAR NADA MÁS COMENZAR CON CSS -->
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <!-- ESTO ES ÚNICA Y EXCLUSIVAMENTE PARA QUE SE MUESTREN LOS DOS DIALOG SIN QUE SE SOLAPEN -->

    <dialog open id="error">
        <img src="img/advertencia.svg" alt="Advertencia">
        <p class="titulo_dialog">Inicia sesión o regístrate para poder ver las fotografías en todo su esplendor</p>
        <ul>
            <!-- Este <a> se esfumará cuando lleguemos a JS -->
            <li><a href="#login">Iniciar sesión</a></li>
            <li><a href="registro.php">Registrarse</a></li>
        </ul>
    </dialog>
</body>
</html>