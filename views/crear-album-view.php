<?php
    require_once "helpers/funciones.php";
    session_start();

    generarHead('crear-album');
?>
<body>
    <?php
        require_once "inc/header.php";
    ?>
    <main>
        <section id="tab-crear-album">
            <h1>Crea tu álbum</h1>
            <form action="usuario.php">
                <div class="omrs-input-group">
                    <label class="omrs-input-filled">
                        <input type="text" placeholder=" " name="titulo" id="titulo-album">
                        <span class="omrs-input-label">Titulo</span>
                    </label>
                </div>
                <div class="omrs-input-group">
                    <label class="omrs-input-filled">
                        <textarea></textarea>
                        <span class="omrs-input-label">Descripción</span>
                    </label>
                </div>
                <div>
                    <button type="submit" id="btn-crear">Crear álbum</button>
                </div>
            </form>
        </section>
    </main>
    <?php
        require_once "inc/footer.php";
    ?>
</body>
</html>
