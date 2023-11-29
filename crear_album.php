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
    <link rel="stylesheet" href="css/global/crear-album.css">
    <link rel="stylesheet" href="css/ordenador/crear-album.css">
    <link rel="stylesheet" href="css/tablet/crear-album.css">
    <link rel="stylesheet" href="css/movil/crear-album.css">
    <link rel="alternate stylesheet" href="css/modos-alternativos/oscuro.css" title="Modo oscuro (predeterminado)">
    <link rel="alternate stylesheet" href="css/modos-alternativos/claro.css" title="Modo claro">
    <link rel="alternate stylesheet" href="css/modos-alternativos/alto-contraste.css" title="Modo de alto contraste">
    <link rel="alternate stylesheet" href="css/modos-alternativos/letra-mayor.css" title="Modo de tipo de letra mayor">
    <link rel="alternate stylesheet" href="css/modos-alternativos/letra-mayor-y-alto-contraste.css" title="Modo de letra mayor y alto contraste">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php
    include_once "inc/header-no-registrado.php";
?>
    <main>
          <section id="tab-crear-album">
            <h1>Crea tu álbum</h1>
            <form action="usuario.php">
                <div class="omrs-input-group">
                    <label class="omrs-input-filled">
                        <input type="text" placeholder=" " name="titulo" id="titulo-album">
                        <span class="omrs-input-label">Titulo</span>
                    </label>
                </div>

                <div class="omrs-input-group">
                    <label class="omrs-input-filled">
                        <textarea></textarea>
                        <span class="omrs-input-label">Descripción</span>
                    </label>
                </div>

                <div>
                    <button type="submit" id="btn-crear">Crear álbum</button>
                </div>
            </form>
          </section>
    </main>
<?php
    include_once "inc/footer.php";
?>
</body>
</html>