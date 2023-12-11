<?php
    require_once "helpers/funciones.php";
    session_start();

    generarHead('registro');
?>
<body>
    <?php
        require_once "inc/header.php";
    ?>
    <main>
        <div id="creacion-cuenta">
            <h1>Crear cuenta</h1>
            <?php
                generarFormularioRegistro(resultado_pais: $resultado_pais);
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
        require_once "inc/footer.php";
    ?>
</body>
</html>
