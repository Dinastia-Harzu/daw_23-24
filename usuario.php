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
    <title>Título imagen - Masthermatika</title>
    <link rel="stylesheet" href="css/global/style.css">
    <link rel="stylesheet" href="css/ordenador/style.css">
    <link rel="stylesheet" href="css/tablet/style.css">
    <link rel="stylesheet" href="css/movil/style.css">
    <link rel="stylesheet" href="css/global/usuario.css">
    <link rel="stylesheet" href="css/ordenador/usuario.css">
    <link rel="stylesheet" href="css/tablet/usuario.css">
    <link rel="stylesheet" href="css/movil/usuario.css">
    <?php
        echo '<link rel="stylesheet" href="css/modos-alternativos/' . $tema . '.css">';
    ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php
    include_once "inc/header_reg.php";
?>
    <main id="tab-usuario">
        <h1>Usuario</h1>
        <section id="datos-usu">
            <div>
                <h2>Mis datos</h2>
                <p>
                    <p><label for="pfp"><img src="img/placeholder.png" alt="Foto de perfil"></label></p>
                    <p><input type="file" name="pfp" id="pfp"></p>
                    <input type="button" value="Cambiar">
                </p>
                <?php
                    $datos_usuario = array(
                        'ADMIN' => array("admin@corr.eo", "Madrid", "España"),
                        'DEBUG' => array("debug@debug", "Nottinghamshire", "Inglaterra"),
                        'agrg11' => array("agrg11@alu.ua.es", "Benidorm", "España"),
                        'mgv' => array("mgv76@alu.ua.es", "Ibi", "España"),
                        'TONC' => array("cearn@coronac.com", "Copenague", "Dinamarca")
                    );
                    $usuario = $_SESSION["usuario"];
                    echo <<<hereDOC
                        <p>Nombre: $usuario</p>
                        <p>Correo: {$datos_usuario[$usuario][0]}</p>
                        <p>Ciudad: {$datos_usuario[$usuario][1]}</p>
                        <p>Pais: {$datos_usuario[$usuario][2]}</p>
                    hereDOC;
                ?>
            </div>

            <div id="funciones">
                <p><a href="mis-datos.php?usu=agrg11">Mis datos</a></p>
                <p><a href="#">Mis álbumes</a></p>
                <p><a href="crear_album.php">Crear álbum</a></p>
                <p><a href="solicitar_album.php">Solicitar álbum</a></p>
                <p><a href="configurar.php">Configurar estilos</a></p>
                <p><a href="index.php">Volver a inicio</a></p>
                <form action="control-usuario.php" method="post">
                    <input type="hidden" name="cerrar-sesion" value="true">
                    <button type="submit">Cerrar sesión</button>
                </form>
            </div>
        </section>
    </main>
<?php
    include_once "inc/footer.php";
?>
    <!--Dialog con Editar Perfil-->
    <dialog id="editar-perfil">

        <h3>Edita tus datos</h3>

        <form action="usuario.php">
            <p>
                <label for="usuario" >Usuario:</label>
                <input type="text" id="usuario">
            </p>

            <p>
                <label for="ciudad" >Ciudad:</label>
                <input type="text" id="ciudad">
            </p>

            <p>
                <label for="paises">País:</label>
                <select name="paises" id="paises">
                    <option value="cod_es">España</option>
                    <option value="cod_fr">Francia</option>
                    <option value="cod_uk">Reino Unido</option>
                    <option value="cod_al">Alemania</option>
                    <option value="cod_it">Italia</option>
                    <option value="cod_bel">Bélgica</option>
                    <option value="cod_chi">China</option>
                    <option value="cod_sui">Suiza</option>
                    <option value="cod_pol">Polonia</option>
                    <option value="cod_usa">Estados Unidos</option>
                </select>
            </p>

            <input type="submit" value="Guardar cambios">
            <a href="usuario.php">Salir sin guardar</a>
        </form>
    </dialog>
</body>
</html>