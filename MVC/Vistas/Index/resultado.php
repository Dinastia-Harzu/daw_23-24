<main>
    <?php $nombre_pais = $resultado_foto_busqueda[0]["NomPais"] ?? "--Selecciona un pais--"; ?>
    <div class="tab-busc">
        <div class="omrs-input-group">
            <label class="omrs-input-filled">
                <input type="text" placeholder=" " name="titulo" id="titulo" value="<?= $titulo ?>" disabled>
                <span class="omrs-input-label">Titulo</span>
            </label>
        </div>
        <div class="omrs-input-group">
            <label class="omrs-input-filled">
                <input type="date" placeholder=" " name="fecha-desde" id="fecha-desde" value="<?= $desde ?>" disabled>
                <span class="omrs-input-label">Desde</span>
            </label>
        </div>
        <div class="omrs-input-group">
            <label class="omrs-input-filled">
                <input type="date" placeholder=" " name="fecha-hasta" id="fecha-hasta" value="<?= $hasta ?>" disabled>
                <span class="omrs-input-label">Hasta</span>
            </label>
        </div>
        <div class="omrs-input-group">
            <label class="omrs-input-filled">
                <select name="pais" id="paises" disabled>
                    <option value="<?= $pais ?>" selected disabled><?= $nombre_pais ?></option>
                </select>
                <span class="omrs-input-label">País</span>
            </label>
        </div>
    </div>
    <h1 class="titulo-index">Resultados</h1>
    <section class="grid-img">
        <?php foreach($resultado_foto_busqueda as $fila): ?>
            <article>
                <h2><?= $fila["Titulo"] ?></h2>
                <a href="foto/<?= $fila["IdFoto"] ?>">
                    <img src="<?= $fila["Fichero"] ?>" alt="<?= $fila["Alternativo"] ?>">
                </a>
                <p><?= $nombre_pais ?></p>
                <time><?= $fila["Fecha"] ?></time>
            </article>
        <?php endforeach; ?>
    </section>
</main>
