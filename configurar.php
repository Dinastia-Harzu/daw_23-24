<?php
    require_once "helpers/funciones.php";

    $conexion = abrirConexion();

    generarHead('configurar');
?>
<body>
    <?php
        require_once "inc/header.php";
    ?>
    <main>
        <h2>Elige el estilo de la página</h2>
        <div id ="datos-usuario">
            <?php
                if($resultado = $conexion->query("SELECT * FROM estilos")) {
                    while($fila = $resultado->fetch_assoc()) {
                        echo '<p>' . $fila["Descripcion"] . '</p>';
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
