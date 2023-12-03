<?php
    require_once "helpers/funciones.php";
    session_start();

    if($tema = $_POST["tema"] ?? $_SESSION["tema"] ?? false) {
        $_SESSION["tema"] = $tema;
    } else {
        $tema = 'oscuro';
    }

    $conexion = abrirConexion();

    generarHead('configurar', 'respuesta-usuario');
?>
<body>
    <?php
        require_once "inc/header.php";
    ?>
    <main>
        <h2>Elige el estilo de la página</h2>
        <form action="configurar.php" method="post" id ="datos-usuario">
            <select name="tema" id="tema">
                <?php
                    if($resultado = $conexion->query("SELECT * FROM estilos")) {
                        while($fila = $resultado->fetch_assoc()) {
                            $predeterminado = $fila["Nombre"] == $tema ? 'selected' : '';
                            echo '<option ' . $predeterminado . ' value="' . $fila["Nombre"] . '">' . $fila["Descripcion"] . '</button>';
                        }
                        cerrarConexion($resultado, $conexion);
                    }
                ?>
            </select>
            <button type="submit">Cargar estilo</button>
        </form>
    </main>
    <?php
        require_once "inc/footer.php";
    ?>
</body>
</html>
