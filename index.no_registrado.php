<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global/style.css">
    <link rel="stylesheet" href="css/ordenador/style.css">
    <link rel="stylesheet" href="css/tablet/style.css">
    <link rel="stylesheet" href="css/movil/style.css">
    <link rel="stylesheet" href="css/global/index.css">
    <link rel="stylesheet" href="css/ordenador/index.css">
    <link rel="stylesheet" href="css/tablet/index.css">
    <link rel="stylesheet" href="css/movil/index.css">
    <link rel="alternate stylesheet" href="css/modos-alternativos/oscuro.css" title="Modo oscuro (predeterminado)">
    <link rel="alternate stylesheet" href="css/modos-alternativos/claro.css" title="Modo claro">
    <link rel="alternate stylesheet" href="css/modos-alternativos/alto-contraste.css" title="Modo de alto contraste">
    <link rel="alternate stylesheet" href="css/modos-alternativos/letra-mayor.css" title="Modo de tipo de letra mayor">
    <link rel="alternate stylesheet" href="css/modos-alternativos/letra-mayor-y-alto-contraste.css" title="Modo de letra mayor y alto contraste">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="javascript/common.js"></script>
    <script src="javascript/dialogos.js"></script>
    <script src="javascript/index.js"></script>
    <title>Masthermatika</title>
</head>
<body>
<?php
    include("inc/header.php");
?>
    <main>
        <div id="tab-login">
            <ul>
                <li>Iniciar sesión</li>
                <li>
                    <a href="registro.php">Registrarse</a>
                </li>
            </ul>
        </div>
        <h1 class="titulo-index">Últimas imágenes</h1>
        <section class="grid-img">
            <article>
                <img src="img/foto1.png" alt="Última foto #1">
            </article>
            <article>
                <img src="img/foto2.png" alt="Última foto #2">
            </article>
            <article>
                <img src="img/foto3.png" alt="Última foto #3">
            </article>
            <article>
                <img src="img/foto4.png" alt="Última foto #4">
            </article>
            <article>
                <img src="img/foto5.png" alt="Última foto #5">
            </article>
        </section>
    </main>
<?php
    include("inc/footer.php");
?>
</body>
</html>