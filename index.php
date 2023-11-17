<?php

session_start();
if(!isset($_SESSION["usuario"])) {
    header("Location: index.no_registrado.php");
}

$tema = isset($_SESSION["tema"]) ? $_SESSION["tema"] : "oscuro";

?>
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
    <?php
        echo '<link rel="stylesheet" href="css/modos-alternativos/' . $tema . '.css">';
    ?>
    <link rel="stylesheet" href="css/impresion/style.css" media="print">
    <link rel="stylesheet" href="css/impresion/index.css" media="print">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Masthermatika</title>
</head>
<body>
<?php
    include_once "inc/header_reg.php";
?>
    <figure>
        <img src="img/logo-y-nombre.png" alt="Logo, nombre y subtítulo de la página: Masthermatika">
    </figure>
    <main>
        <h1 class="titulo-index">Últimas imágenes</h1>
        <div class="grid-img">
            <article>
                <h2>Título imagen</h2>
                <a href="detalle.php?id=1"><img src="img/foto1.png" alt="Última foto #1"></a>
                <p>País</p>
                <time>2023</time>
            </article>
            <article>
                <h2>Título imagen</h2>
                <a href="detalle.php?id=2"><img src="img/foto2.png" alt="Última foto #2"></a>
                <p>País</p>
                <time>2023</time>
            </article>
            <article>
                <h2>Título imagen</h2>
                <a href="detalle.php?id=3"><img src="img/foto3.png" alt="Última foto #3"></a>
                <p>País</p>
                <time>2023</time>
            </article>
            <article>
                <h2>Título imagen</h2>
                <a href="detalle.php?id=4"><img src="img/foto4.png" alt="Última foto #4"></a>
                <p>País</p>
                <time>2023</time>
            </article>
            <article>
                <h2>Título imagen</h2>
                <a href="detalle.php?id=5"><img src="img/foto5.png" alt="Última foto #5"></a>
                <p>País</p>
                <time>2023</time>
            </article>
        </div>
    </main>
<?php
    include_once "inc/footer.php";
?>
</body>
</html>