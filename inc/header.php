<header>
    <aside>
        <figure>
            <img src="img/logo-y-nombre.png" alt="Logo, nombre y subtítulo de la página: Masthermatika" id="logo">
        </figure>
        <nav>
            <ul id="nav-texto">
                <li>
                    <a href="<?= RUTA_APP ?>">Inicio</a>
                </li>
                <li>
                    <a href="busqueda">Descubrir</a>
                </li>
                <?php if(isset($_SESSION["usuario"])): ?>
                    <li>
                        <a href="publicar">Publicar</a>
                    </li>;
                <?php endif; ?>
            </ul>
            <ul id="nav-iconos">
                <li>
                    <a href="<?= RUTA_APP ?>"><i class="fa fa-home"></i></a>
                </li>
                <li class="dropdown">
                    <div class="dropdown-button"><i class="fa fa-search"></i></div>
                    <div class="dropdown-content">
                        <a href="busqueda">Descubrir</a>
                        <form action="resultados" method="post">
                            <input type="text" name="busqueda-rapida" placeholder="Búsqueda rápida">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </li>
                <?php if(isset($_SESSION["usuario"])): ?>
                    <li>
                        <a href="publicar"><i class="fa fa-upload"></i></a>
                    </li>;
                <?php endif; ?>
            </ul>
        </nav>
    </aside>
    <form action="resultados" method="post" id="busqueda-rapida">
        <input type="text" name="busqueda-rapida" placeholder="Búsqueda rápida">
        <button type="submit"><i class="fa fa-search"></i></button>
    </form>
    <?php if(isset($_SESSION["usuario"])): ?>
        <figure>
            <a href="usuario">
                <img src="img/placeholder.png" alt="Foto de perfil del usuario">
            </a>
        </figure>
    <?php endif; ?>
</header>
