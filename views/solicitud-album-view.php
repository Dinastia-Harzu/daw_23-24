<?php
    session_start();
    if(!isset($_SESSION["usuario"])) {
        header("Location: index.php");
    }
    $tema = isset($_SESSION["tema"]) ? $_SESSION["tema"] : "oscuro";

    generarHead(pagina: 'solicitar-album', estilo: 'album');

    require_once "inc/header.php";
?>
<body>
    <main>
        <h1>Solicitud de impresión de álbum</h1>
        <p>Mediante esta opción puedes solicitar la impresión y envío de uso de tus álbumes a todo color, toda resolución.</p>
        <div id="central">
            <aside>
                <h2>Tarifas</h2>
                <table>
                    <caption>Leyenda de tarifas</caption>
                    <tr>
                        <th>Concepto</th>
                        <th>Tarifa</th>
                    </tr>
                    <tr>
                        <td>&lt; 5 páginas</td>
                        <td>0.10€ por pág.</td>
                    </tr>
                    <tr>
                        <td>entre 5 y 11 páginas</td>
                        <td>0.08€ por pág.</td>
                    </tr>
                    <tr>
                        <td>&gt; 11 páginas</td>
                        <td>0.07€ por pág.</td>
                    </tr>
                    <tr>
                        <td>Blanco y negro</td>
                        <td>0€</td>
                    </tr>
                    <tr>
                        <td>A color</td>
                        <td>0.05€ por foto</td>
                    </tr>
                    <tr>
                        <td>Resolución mayor a 300 dpi</td>
                        <td>0.02€ por foto</td>
                    </tr>
                </table>
                <?php require_once 'tabla-album.php'; ?>
            </aside>
            <section>
                <h2>Formulario de solicitud</h2>
                <p>Rellena el siguiente formulario aportando todos los detalles para confeccionar tu álbum</p>
                <form action="respuesta-album.php" oninput="dpi.value = parseInt(resolucion.value);" method="post">
                    <div class="omrs-input-group">
                        <label class="omrs-input-underlined">
                            <input type="text" placeholder=" " name="nombre" id="nombre" required>
                            <span class="omrs-input-label">Nombre</span>
                            <span class="omrs-input-helper">Tu nombre</span>
                        </label>
                    </div>
                    <div class="omrs-input-group">
                        <label class="omrs-input-underlined">
                            <input type="text" placeholder=" " name="titulo" id="titulo" required>
                            <span class="omrs-input-label">Título</span>
                            <span class="omrs-input-helper">El título para el álbum impreso</span>
                        </label>
                    </div>
                    <div class="omrs-input-group">
                        <label class="omrs-input-underlined">
                            <textarea placeholder=" " name="texto-adicional" id="texto-adicional" rows="10" maxlength="4000"></textarea>
                            <span class="omrs-input-label">Texto adicional</span>
                            <span class="omrs-input-helper">Hasta 4000 caracteres</span>
                        </label>
                    </div>
                    <div class="omrs-input-group">
                        <label class="omrs-input-underlined">
                            <input type="email" placeholder=" " name="correo" id="correo" required>
                            <span class="omrs-input-label">Correo electrónico</span>
                        </label>
                    </div>
                    <fieldset>
                        <legend>Dirección</legend>
                        <div class="omrs-input-group">
                            <label class="omrs-input-underlined">
                                <input type="text" name="direccion" id="direccion" placeholder=" ">
                                <span class="omrs-input-label">Dirección</span>
                                <span class="omrs-input-helper">La calle, avenida, bulevar, etc.</span>
                            </label>
                        </div>
                        <div class="omrs-input-group">
                            <label class="omrs-input-underlined">
                                <input type="number" name="numero" id="numero" placeholder=" ">
                                <span class="omrs-input-label">Número</span>
                            </label>
                        </div>
                        <div class="omrs-input-group">
                            <label class="omrs-input-underlined">
                                <input type="text" name="cp" id="cp" placeholder=" ">
                                <span class="omrs-input-label">Código postal</span>
                            </label>
                        </div>
                        <div class="omrs-input-group">
                            <label class="omrs-input-underlined">
                                <input type="text" name="ciudad" id="ciudad" placeholder=" ">
                                <span class="omrs-input-label">Ciudad</span>
                            </label>
                        </div>
                        <div class="omrs-input-group">
                            <label class="omrs-input-underlined">
                                <input type="text" name="provincia" id="provincia" placeholder=" ">
                                <span class="omrs-input-label">Provincia</span>
                            </label>
                        </div>
                        <div class="omrs-input-group">
                            <label class="omrs-input-underlined">
                                <input type="text" name="pais" id="pais" placeholder=" ">
                                <span class="omrs-input-label">País</span>
                            </label>
                        </div>
                    </fieldset>
                    <div class="omrs-input-group">
                        <label class="omrs-input-underlined">
                            <input type="tel" placeholder=" " name="telefono" id="telefono">
                            <span class="omrs-input-label">Teléfono</span>
                            <span class="omrs-input-helper">El número de teléfono al que contactar</span>
                        </label>
                    </div>
                    <div class="omrs-input-group">
                        <label class="omrs-input-underlined" id="swatch">
                            <input type="color" id="color" name="color">
                            <span class="omrs-input-label">Color de la portada</span>
                        </label>
                    </div>
                    <div class="omrs-input-group">
                        <label class="omrs-input-underlined">
                            <input type="number" placeholder=" " name="copias" id="copias" min="1" value="1">
                            <span class="omrs-input-label">Número de copias</span>
                            <span class="omrs-input-helper">Mínimo una copia</span>
                        </label>
                    </div>
                    <div class="omrs-input-group">
                        <label class="omrs-input-underlined">
                            <input type="range" placeholder=" " name="resolucion" id="resolucion" step="150" min="150" max="900" value="150">
                            <span class="omrs-input-label">Resolución de impresión</span>
                            <div>
                                <output name="dpi" for="resolucion">150</output>
                                <span class="texto-cualquiera">dpi</span>
                            </div>
                            <span class="omrs-input-helper">dpi = <em>dots per inch</em> = puntos por pulgada</span>
                        </label>
                    </div>
                    <div class="omrs-input-group">
                        <label class="omrs-input-underlined">
                            <select name="album" id="album" required>
                                <option disabled selected value>-- Selecciona una opción --</option>
                                <?php
                                    foreach($resultado_album_solicitud as $fila) {
                                        echo <<<hereDOC
                                            <option value = "{$fila["Titulo"]}">{$fila["Titulo"]}</option>
                                        hereDOC;
                                    }
                                ?>
                            </select>
                            <span class="omrs-input-label">Álbum de Masthermatika</span>
                            <span class="omrs-input-helper">Elige uno de tus álbumes</span>
                        </label>
                    </div>
                    <div class="omrs-input-group">
                        <label class="omrs-input-underlined">
                            <input type="date" name="fecha-recepcion" id="fecha-recepcion">
                            <span class="omrs-input-label">Fecha recepción</span>
                            <span class="omrs-input-helper">Establece una fecha de recepción aproximada</span>
                        </label>
                    </div>
                    <div class="omrs-input-group">
                        <label class="omrs-input-underlined">
                            <div class="checkbox-wrapper-19">
                                <input type="checkbox" id="cbtest-19" />
                                <label for="cbtest-19" class="check-box"></label>
                            </div>
                            <span class="omrs-input-label">Impresión a color</span>
                        </label>
                    </div>

                    <div class="campo-boton-submit">
                        <button type="submit">Solicitar</button>
                    </div>
                </form>
            </section>
        </div>
    </main>
<?php
    require_once "inc/footer.php";
?>
</body>
</html>