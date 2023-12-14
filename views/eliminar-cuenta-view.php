<?php
    require_once "helpers/funciones.php";
    session_start();

    generarHead(pagina:'eliminar-cuenta', estilo:'respuesta-usuario');
?>
<body>
    <?php
        require_once "inc/header.php";
    ?>
    <main>
        <h2>Confirmacion de eliminar cuenta:<h2>
        <section>
            <div id="datos-usuario">
                <h4>Los datos que perderás son:<h4>
                    <?php
                    $num_fotos_total = 0;
                    foreach ($resultado_foto_eliminar as $fila) {
                        echo '<p>Fotos del álbum  <em>' . $fila["Titulo"] . '</em>: ' . $fila["NumFotos"] . '</p>';
                        $num_fotos_total += $fila["NumFotos"];
                    }
                    echo '<p>' . 'Fotos totales: ' . $num_fotos_total . '</p>';
                ?>
                <hr>
                <form action="respuesta-eliminacion.php" method="post">
                    <p>Introduce tu contraseña para confirmar:</p>
                    <div class="omrs-input-group">
                        <label class="omrs-input-filled">
                            <input type="passsword" placeholder=" " name="clave" id="clave">
                        </label>
                    </div>
                    <div class="campo-boton-submit">
                        <button type="submit" id="btn-registro">Confirmar</button>
                    </div>
                </form>
            </div>
        </section>
    </main>
    <?php
        require_once "inc/footer.php";
    ?>
</body>
</html>