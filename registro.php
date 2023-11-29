<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Masthermatika</title>
    <link rel="stylesheet" href="css/global/style.css">
    <link rel="stylesheet" href="css/ordenador/style.css">
    <link rel="stylesheet" href="css/tablet/style.css">
    <link rel="stylesheet" href="css/movil/style.css">
    <link rel="stylesheet" href="css/global/registro.css">
    <link rel="stylesheet" href="css/ordenador/registro.css">
    <link rel="stylesheet" href="css/tablet/registro.css">
    <link rel="stylesheet" href="css/movil/registro.css">
    <link rel="alternate stylesheet" href="css/modos-alternativos/oscuro.css" title="Modo oscuro (predeterminado)">
    <link rel="alternate stylesheet" href="css/modos-alternativos/claro.css" title="Modo claro">
    <link rel="alternate stylesheet" href="css/modos-alternativos/alto-contraste.css" title="Modo de alto contraste">
    <link rel="alternate stylesheet" href="css/modos-alternativos/letra-mayor.css" title="Modo de tipo de letra mayor">
    <link rel="alternate stylesheet" href="css/modos-alternativos/letra-mayor-y-alto-contraste.css" title="Modo de letra mayor y alto contraste">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="javascript/common.js"></script>
</head>
<body>
<?php
    include_once "inc/header.php";

    // Select para obtener variables
    $id = mysqli_connect("","root","","daw");
    if(mysqli_connect_errno()) {
        echo mysqli_connect_error();
        exit();
    }

    $result = mysqli_query($id,"SELECT * FROM paises");

    // Definimos las variables que iran en los campos del usuario
    $nombre = "";
    $contraseña = "";
    $correo = "";
    $fecha_nac = "";
    $ciudad = "";
    $pais = "";
    $pfp = "img/placeholder_grande.png";
    $texto_submit = "Registrarse";
?>
    <main>
        <div id="creacion-cuenta">
            <h1>Crear cuenta</h1>
            <?php
            include_once "inc/form-reg.php";
            ?>
        </div>
        <section id="tab-google">
            <p>...o continúa con Google</p>
            <a href="https://accounts.google.com" class="google-login">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" class="l">
                    <g fill-rule="evenodd" clip-rule="evenodd">
                        <path d="M20.64 12.2c0-.63-.06-1.25-.16-1.84H12v3.49h4.84a4.14 4.14 0 0 1-1.8 2.71v2.26h2.92a8.78 8.78 0 0 0 2.68-6.61z" fill="#4285F4"></path><path d="M12 21a8.6 8.6 0 0 0 5.96-2.18l-2.91-2.26a5.41 5.41 0 0 1-8.09-2.85h-3v2.33A9 9 0 0 0 12 21z" fill="#34A853"></path><path d="M6.96 13.71a5.41 5.41 0 0 1 0-3.42V7.96h-3a9 9 0 0 0 0 8.08l3-2.33z" fill="#FBBC05"></path><path d="M12 6.58c1.32 0 2.5.45 3.44 1.35l2.58-2.58A9 9 0 0 0 3.96 7.96l3 2.33A5.36 5.36 0 0 1 12 6.6z" fill="#EA4335"></path>
                    </g>
                </svg>
                Inicia sesión con Google
            </a>
            <p>¿Ya tienes una cuenta?</p>
            <p class="enlace-simple">Inicia sesión</p>
        </section>
    </main>
<?php
    include_once "inc/footer.php";
?>
</body>
</html>