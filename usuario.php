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
    <link rel="alternate stylesheet" href="css/modos-alternativos/oscuro.css" title="Modo oscuro (predeterminado)">
    <link rel="alternate stylesheet" href="css/modos-alternativos/claro.css" title="Modo claro">
    <link rel="alternate stylesheet" href="css/modos-alternativos/alto-contraste.css" title="Modo de alto contraste">
    <link rel="alternate stylesheet" href="css/modos-alternativos/letra-mayor.css" title="Modo de tipo de letra mayor">
    <link rel="alternate stylesheet" href="css/modos-alternativos/letra-mayor-y-alto-contraste.css" title="Modo de letra mayor y alto contraste">
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
            echo <<<hereDOC
                <p>Nombre: {$_SESSION["usuario"]}</p>
                <p>Correo: {$_SESSION["correo"]}</p>
                <p>Contraseña: *******</p>
                <p>Ciudad: {$_SESSION["ciudad"]}</p>
                <p>Pais: {$_SESSION["pais"]}</ps>
        hereDOC;
?>
            </div>

            <div id="funciones">
                <p><a href="#editar_perfil">Editar perfil</a></p>
                <p><a href="javascript:void(0);">Mis álbumes</a></p>
                <p><a href="crear_album.php">Crear álbum</a></p>
                <p><a href="solicitar_album.php">Solicitar álbum</a></p>
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