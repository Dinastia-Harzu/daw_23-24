<header>
    <aside>
        <figure>
            <img src="img/logo-y-nombre.png" alt="Logo, nombre y subtítulo de la página: Masthermatika" id="logo">
        </figure>
        <nav>
            <ul id="nav-texto">
                <li>
                    <a href="index.php">Inicio</a>
                </li>
                <li>
                    <a href="busqueda.php">Descubrir</a>
                </li>
                <?php if(isset($_SESSION["usuario"])) {
                    echo '<li><a href="publicar.php">Publicar</a></li>';
                } ?>
            </ul>
            <ul id="nav-iconos">
                <li>
                    <a href="index.php"><i class="fa fa-home"></i></a>
                </li>
                <li class="dropdown">
                    <div class="dropdown-button"><i class="fa fa-search"></i></div>
                    <div class="dropdown-content">
                        <a href="busqueda.php">Descubrir</a>
                        <form action="resultado.php">
                            <input type="text" name="busqueda-rapida" placeholder="Búsqueda rápida">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </li>
                <?php if(isset($_SESSION["usuario"])) {
                    echo '<li><a href="publicar.php"><i class="fa fa-upload"></i></a></li>';
                } ?>
            </ul>
        </nav>
    </aside>
    <form action="resultado.php" id="busqueda-rapida">
        <input type="text" name="busqueda-rapida" placeholder="Búsqueda rápida">
        <button type="submit"><i class="fa fa-search"></i></button>
    </form>
    <?php if(isset($_SESSION["usuario"])) {
        echo <<<hereDOC
            <figure>
                <a href="usuario.php">
                    <img src="img/placeholder.png" alt="Foto de perfil del usuario">
                </a>
            </figure>
        hereDOC;
    } ?>
</header>
