<?php
    session_start();
    if(isset($_SESSION["usuario"])) {
        setcookie("ultima-vez", time(), 2 * time());
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
    if(isset($_COOKIE["recuerdame"])) {
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