<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descubrir - Masthermatika</title>
    <link rel="stylesheet" href="css/global/style.css">
    <link rel="stylesheet" href="css/ordenador/style.css">
    <link rel="stylesheet" href="css/tablet/style.css">
    <link rel="stylesheet" href="css/movil/style.css">
    <link rel="stylesheet" href="css/global/busqueda.css">
    <link rel="stylesheet" href="css/ordenador/busqueda.css">
    <link rel="stylesheet" href="css/tablet/busqueda.css">
    <link rel="stylesheet" href="css/movil/busqueda.css">
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

    // Select para obtener variables
    $id = mysqli_connect("", "root", "", "daw");
    if(mysqli_connect_errno()) {
        echo mysqli_connect_error();
        exit();
    }

    $result = mysqli_query($id,"SELECT IdFoto, Titulo, DATE_FORMAT(FRegistro,'%e/%c/%Y') as Fecha, Fichero, NomPais FROM fotos f JOIN paises p ON(p.IdPais = f.Pais);");
?>
    <main id="grid-params">
        <h1>Descubre</h1>
        <form action="resultado.php" method="post" class="tab-busc tab-params">
            <section >
                <h2>Introduce los parámetros de búsqueda:</h2>
                <p>
                    <label for="titulo">Título: </label>
                    <input type="text" name="titulo" id="titulo" placeholder="Introduce el título...">
                </p>
                <p>
                    <label for="fecha-desde" class="tab-busc-fecha">Fecha entre:</label>
                    <input type="date" name="fecha-desde" id="fecha-desde">

                    <label for="fecha-hasta" class="tab-busc-y">y</label>
                    <input type="date" name="fecha-hasta" id="fecha-hasta">
                </p>
                <p>
                    <label for="paises">País: </label>
                    <select name="pais" id="paises">
                        <?php
                            while($row = mysqli_fetch_array($result)) {
                                echo <<<hereDOC
                                    <option value = "{$row["NomPais"]}">{$row["NomPais"]}</option>
                                hereDOC;
                            }
                        ?>
                    </select>
                </p>
            </section>
            <p id="busc_2">
                <input type="submit" value="Enviar">
            </p>
        </form>
    </main>
<?php
    include_once "inc/footer.php";
?>
</body>
</html>