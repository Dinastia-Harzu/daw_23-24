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
    <link rel="stylesheet" href="css/impresion/style.css" media="print">
    <link rel="stylesheet" href="css/impresion/resultado.css" media="print">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php
        include_once "inc/header_reg.php";
    ?>
    <figure>
        <img src="img/logo-y-nombre.png" alt="Logo, nombre y subtítulo de la página: Masthermatika">
    </figure>
    <main>
        <?php
            $filtros = array(
                isset($_POST["titulo"]) ? $_POST["titulo"] : "",
                isset($_POST["fecha-desde"]) ? $_POST["fecha-desde"] : "",
                isset($_POST["fecha-hasta"]) ? $_POST["fecha-hasta"] : "",
                $_POST["pais"]
            );
            $sql = "
                SELECT f.*, a.Titulo TituloAlbum, a.Descripcion DescripcionAlbum, NomPais
                FROM fotos f
                JOIN albumes a ON(Album = IdAlbum)
                JOIN paises p ON(Pais = IdPais)
                WHERE
                1 = 1
            ";
            if($filtros[0] != "") {
                $sql .= "AND Titulo = $filtros[0]";
            }
            if($filtros[1] != "") {
                $sql .= "AND Fecha >= $filtros[1]";
            }
            if($filtros[2] != "") {
                $sql .= "AND Fecha <= $filtros[2]";
            }
            if($filtros[3] != "NA") {
                $sql .= "AND NomPais = $filtros[3]";
            }
            echo <<<hereDOC
                <div class="tab-busc">
                    <p>
                        <label for="titulo">Título: {$_POST["titulo"]}</label>
                    </p>
                    <p>
                        <label for="fecha_d" class="tab-busc-fecha">Fecha entre: {$_POST["fecha_d"]} y {$_POST["fecha_h"]}</label>
                    </p>
                    <p>
                        <label for="paises">País: {$_POST["paises"]}</label>
                    </p>
                </div>
                <h1 class="titulo-index">Resultados</h1>
                <section class="grid-img">
                    <article>
                        <h2>Título imagen</h2>
                        <a href="detalle.php">
                            <img src="img/foto1.png" alt="Última foto #1">
                        </a>
                        <p>País</p>
                        <time>2023</time>
                    </article>
                    <article>
                        <h2>Título imagen</h2>
                        <a href="detalle.php">
                            <img src="img/foto2.png" alt="Última foto #2">
                        </a>
                        <p>País</p>
                        <time>2023</time>
                    </article>
                    <article>
                        <h2>Título imagen</h2>
                        <a href="detalle.php">
                            <img src="img/foto3.png" alt="Última foto #3">
                        </a>
                        <p>País</p>
                        <time>2023</time>
                    </article>
                    <article>
                        <h2>Título imagen</h2>
                        <a href="detalle.php">
                            <img src="img/foto4.png" alt="Última foto #4">
                        </a>
                        <p>País</p>
                        <time>2023</time>
                    </article>
                    <article>
                        <h2>Título imagen</h2>
                        <a href="detalle.php">
                            <img src="img/foto5.png" alt="Última foto #5">
                        </a>
                        <p>País</p>
                        <time>2023</time>
                    </article>
                </section>
            hereDOC;
        ?>
    </main>
<?php
    include_once "inc/footer.php";
?>
</body>
</html>