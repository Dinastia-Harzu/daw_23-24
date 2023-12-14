<main>
    <?php if(!isset($_SESSION["usuario"])): ?>
        <div id="tab-login">
            <ul>
                <li>
                    <a href="#login">Iniciar sesión</a>
                </li>
                <li>
                    <a href="usuario/registro">Registrarse</a>
                </li>
            </ul>
        </div>
    <?php endif; ?>
    <h1 class="titulo-index">Últimas imágenes</h1>
    <div class="grid-img">
        <?php foreach($fotos as $foto): ?>
            <article>
                <?php if(isset($_SESSION['usuario'])): ?>
                    <h2><?= $foto['Titulo'] ?></h2>
                    <a href="fotos/<?= $foto['IdFoto'] ?>">
                        <img src="<?= $foto['Fichero'] ?>" alt="<?= $foto['Alternativo'] ?>">
                    </a>
                    <p><?= $foto['NomPais'] ?></p>
                    <time><?= $foto['Fecha'] ?></time>
                <?php else: ?>
                    <a href="#error">
                        <img src="<?= $foto['Fichero'] ?>" alt="<?= $foto['Alternativo'] ?>">
                    </a>
                <?php endif; ?>
            </article>
        <?php endforeach; ?>
    </div>
</main>
