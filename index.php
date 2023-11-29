<?php
    session_start();
    if(!isset($_SESSION["usuario"])) {
        header("Location: index.no_registrado.php");
    }

    $tema = isset($_SESSION["tema"]) ? $_SESSION["tema"] : "oscuro";

    // Select para obtener variables
    $id = mysqli_connect("", "root", "", "daw");
    if(mysqli_connect_errno()) {
        echo mysqli_connect_error();
        exit();
    }
    $result = mysqli_query($id, "
        SELECT
            IdFoto,
            Titulo,
            DATE_FORMAT(FRegistro,'%e/%c/%Y') as Fecha,
            Fichero,
            Pais
        FROM fotos
    ;");
?>
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
    <link rel="stylesheet" href="css/global/index.css">
    <link rel="stylesheet" href="css/ordenador/index.css">
    <link rel="stylesheet" href="css/tablet/index.css">
    <link rel="stylesheet" href="css/movil/index.css">
    <?php
        echo <<<hereDOC
            <link rel="stylesheet" href="css/modos-alternativos/$tema.css">
        hereDOC;
    ?>
    <link rel="stylesheet" href="css/impresion/style.css" media="print">
    <link rel="stylesheet" href="css/impresion/index.css" media="print">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="javascript/dialogos.js"></script>
</head>
<body>
<?php
    include_once "inc/header_reg.php";

    // Select para obtener variables
    $id = mysqli_connect("","root","","daw");
    if(mysqli_connect_errno()) {
        echo mysqli_connect_error();
        exit();
    }

    $result = mysqli_query($id,"SELECT IdFoto, Titulo, DATE_FORMAT(FRegistro,'%e/%c/%Y') as Fecha, Fichero, NomPais FROM fotos f JOIN paises p ON(p.IdPais = f.Pais);");
?>
    <figure>
        <img src="img/logo-y-nombre.png" alt="Logo, nombre y subtítulo de la página: Masthermatika">
    </figure>
    <main>
        <h1 class="titulo-index">Últimas imágenes</h1>
        <div class="grid-img">
            <?php
                while($row = mysqli_fetch_assoc($result)) {
                    echo <<<hereDOC
                        <article>
                            <h2>{$row["Titulo"]}</h2>
                            <a href="detalle.php?id={$row["IdFoto"]}">
                                <img src="{$row["Fichero"]}" alt="Foto">
                            </a>
                            <p>{$row["NomPais"]}</p>
                            <time>{$row["Fecha"]}</time>
                        </article>
                    hereDOC;
                }
                mysqli_free_result($result);
                mysqli_close($id);
            ?>
        </div>
    </main>
    <?php
        include_once "inc/footer.php";
    ?>
</body>
</html>