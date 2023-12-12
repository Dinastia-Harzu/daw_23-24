<?php
    require_once "helpers/funciones.php";
    session_start();

    generarHead('index', dialogos: true);
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
                
                foreach ($resultado_foto as $fila) {
                
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
            ?>
        </div>
    </main>
    <?php
        require_once "inc/footer.php";
    ?>
</body>
</html>
