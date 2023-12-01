<?php
    require_once "helpers/funciones.php";

    generarHead('accesibilidad');
?>
<body>
    <?php
        require_once "inc/header.php";
    ?>
    <main>
        <section>
            <div class="container">
                <div class="text">
                    <h1>Página no encontrada</h1>
                    <p>No existe la página a la que intentas acceder. Esto se puede deber a:</p>
                    <ul>
                        <li>Falta de ortografía al escribir el recurso.</li>
                        <li>URL correcto pero con parámetros incorrectos.</li>
                    </ul>
                    <p>
                        <a href="index.php">Vuelve a la página principal</a>
                    </p>
                </div>
                <div>
                    <img
                        class="image"
                        src="https://omjsblog.files.wordpress.com/2023/07/errorimg.png"
                        alt="Robot triste por error 404"
                    >
                </div>
            </div>
        </section>
    </main>
    <?php
        require_once "inc/footer.php";
    ?>
</body>
</html>
