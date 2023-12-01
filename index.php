<?php

    require_once "helpers/funciones.php";

    generarHead('index', dialogos: true);

    $conexion = abrirConexion();
?>
<body>
    <?php
        require_once "inc/header.php";
    ?>
    <main>
        <?php
            if(!isset($_SESSION["usuario"])) {
                echo <<<hereDOC
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
                hereDOC;
            }
        ?>
        <h1 class="titulo-index">Últimas imágenes</h1>
        <div class="grid-img">
            <?php
                $sql = "
                    SELECT
                        IdFoto,
                        Titulo,
                        DATE_FORMAT(FRegistro,'%e/%c/%Y') as Fecha,
                        Fichero,
                        Pais,
                        Alternativo
                    FROM fotos
                ;";
                if($resultado = $conexion->query($sql)) {
                    while($fila = $resultado->fetch_assoc()) {
                        if(isset($_SESSION["usuario"])) {
                            echo <<<hereDOC
                                <article>
                                    <h2>{$fila["Titulo"]}</h2>
                                    <a href="detalle.php?id={$fila["IdFoto"]}">
                                        <img src="{$fila["Fichero"]}" alt="{$fila["Alternativo"]}">
                                    </a>
                                    <p>{$fila["NomPais"]}</p>
                                    <time>{$fila["Fecha"]}</time>
                                </article>
                            hereDOC;
                        } else {
                            echo <<<hereDOC
                                <article>
                                    <a href="#error">
                                        <img src="{$fila["Fichero"]}" alt="{$fila["Alternativo"]}">
                                    </a>
                                </article>
                            hereDOC;
                        }
                    }
                    cerrarConexion($resultado, $conexion);
                }
            ?>
        </div>
    </main>
    <?php
        require_once "inc/footer.php";
    ?>
</body>
</html>
