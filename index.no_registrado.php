<?php
    session_start();
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
    <link rel="alternate stylesheet" href="css/modos-alternativos/oscuro.css" title="Modo oscuro (predeterminado)">
    <link rel="alternate stylesheet" href="css/modos-alternativos/claro.css" title="Modo claro">
    <link rel="alternate stylesheet" href="css/modos-alternativos/alto-contraste.css" title="Modo de alto contraste">
    <link rel="alternate stylesheet" href="css/modos-alternativos/letra-mayor.css" title="Modo de tipo de letra mayor">
    <link rel="alternate stylesheet" href="css/modos-alternativos/letra-mayor-y-alto-contraste.css" title="Modo de letra mayor y alto contraste">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Masthermatika</title>
</head>
<body>
<?php
    include_once "inc/header.php";
?>
    <main>
        <div id="tab-login">
            <ul>
                <li>
                    <a href="#login">Iniciar sesión</a>
                </li>
                <li>
                    <a href="registro.php">Registrarse</a>
                </li>
            </ul>
        </div>
        <h1 class="titulo-index">Últimas imágenes</h1>
        <section class="grid-img">
            <?php
                for($i = 1; $i <= 5; $i++) {
                    echo <<<hereDOC
                        <a href="#error">
                            <article>
                                <img src="img/foto$i.png" alt="Última foto #$i">
                            </article>
                        </a>
                    hereDOC;
                }
            ?>
        </section>
    </main>
<?php
    include_once "inc/footer.php";
?>
<?php
    if(isset($_SESSION["usuario"])) {
        include_once "inc/dialogos/dialogo-bienvenida.php";
    } else {
        include_once "inc/dialogos/dialogo-login.php";
    }
    for($i = 0; $i < 40; $i++) {
        echo "<br>";
    }
    include_once "inc/dialogos/dialogo-error.php";
?>
</body>
</html>