<?php
    session_start();
    if(!isset($_SESSION["usuario"])) {
        header("Location: index.php");
    }
    $tema = isset($_SESSION["tema"]) ? $_SESSION["tema"] : "oscuro";
?>
<!DOCTYPE html>
<html lang="es">
<?php
    require_once "helpers/funciones.php";

    generarHead(pagina:'respuesta-album', estilo:'album');

    // Hacemos el insert
    anyadirSolicitud();
?>
<body>
<?php
    require_once "inc/header.php";
?>
    <figure>
        <img src="img/logo-y-nombre.png" alt="Logo, nombre y subtítulo de la página: Masthermatika">
    </figure>
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
                <?php
                echo <<<hereDOC
                <form action="#">
                    <div class="omrs-input-group">
                        <label class="omrs-input-filled">
                            <input type="text" placeholder=" " name="nombre" id="nombre" disabled value="{$_POST["nombre"]}">
                            <span class="omrs-input-label">Nombre</span>
                            <span class="omrs-input-helper">Tu nombre</span>
                        </label>
                    </div>
                    <div class="omrs-input-group">
                        <label class="omrs-input-filled">
                            <input type="text" placeholder=" " name="titulo" id="titulo" disabled value="{$_POST["titulo"]}">
                            <span class="omrs-input-label">Título</span>
                            <span class="omrs-input-helper">El título para el álbum impreso</span>
                        </label>
                    </div>
                    <div class="omrs-input-group">
                        <label class="omrs-input-filled">
                            <textarea placeholder=" " name="texto-adicional" id="texto-adicional" rows="10" maxlength="4000" disabled value="{$_POST["texto-adicional"]}"></textarea>
                            <span class="omrs-input-label">Texto adicional</span>
                            <span class="omrs-input-helper">Hasta 4000 caracteres</span>
                        </label>
                    </div>
                    <div class="omrs-input-group">
                        <label class="omrs-input-filled">
                            <input type="email" placeholder=" " name="correo" id="correo" disabled value="{$_POST["correo"]}">
                            <span class="omrs-input-label">Correo electrónico</span>
                        </label>
                    </div>
                    <fieldset>
                        <legend>Dirección</legend>
                        <div class="omrs-input-group">
                            <label class="omrs-input-filled">
                                <input type="text" name="direccion" id="direccion" placeholder=" " disabled value="{$_POST["direccion"]}">
                                <span class="omrs-input-label">Dirección</span>
                                <span class="omrs-input-helper">La calle, avenida, bulevar, etc.</span>
                            </label>
                        </div>
                        <div class="omrs-input-group">
                            <label class="omrs-input-filled">
                                <input type="number" name="numero" id="numero" placeholder=" " disabled value="{$_POST["numero"]}">
                                <span class="omrs-input-label">Número</span>
                            </label>
                        </div>
                        <div class="omrs-input-group">
                            <label class="omrs-input-filled">
                                <input type="text" name="cp" id="cp" placeholder=" " disabled value="{$_POST["cp"]}">
                                <span class="omrs-input-label">Código postal</span>
                            </label>
                        </div>
                        <div class="omrs-input-group">
                            <label class="omrs-input-filled">
                                <input type="text" name="ciudad" id="ciudad" placeholder=" " disabled value="{$_POST["ciudad"]}">
                                <span class="omrs-input-label">Ciudad</span>
                            </label>
                        </div>
                        <div class="omrs-input-group">
                            <label class="omrs-input-filled">
                                <input type="text" name="provincia" id="provincia" placeholder=" " disabled value="{$_POST["provincia"]}">
                                <span class="omrs-input-label">Provincia</span>
                            </label>
                        </div>
                        <div class="omrs-input-group">
                            <label class="omrs-input-filled">
                                <input type="text" name="pais" id="pais" placeholder=" " disabled value="{$_POST["pais"]}">
                                <span class="omrs-input-label">País</span>
                            </label>
                        </div>
                    </fieldset>
                    <div class="omrs-input-group">
                        <label class="omrs-input-filled">
                            <input type="tel" placeholder=" " name="telefono" id="telefono" disabled value="{$_POST["telefono"]}">
                            <span class="omrs-input-label">Teléfono</span>
                            <span class="omrs-input-helper">El número de teléfono al que contactar</span>
                        </label>
                    </div>
                    <div class="omrs-input-group">
                        <label class="omrs-input-filled" id="swatch">
                            <input type="color" id="color" name="color" disabled value="{$_POST["color"]}">
                            <span class="omrs-input-label">Color de la portada</span>
                        </label>
                    </div>
                    <div class="omrs-input-group">
                        <label class="omrs-input-filled">
                            <input type="number" placeholder=" " name="copias" id="copias" min="1" value="1" disabled value="{$_POST["copias"]}">
                            <span class="omrs-input-label">Número de copias</span>
                            <span class="omrs-input-helper">Mínimo una copia</span>
                        </label>
                    </div>
                    <div class="omrs-input-group">
                        <label class="omrs-input-filled">
                            <input type="range" placeholder=" " name="resolucion" id="resolucion" step="150" min="150" max="900" value="150" disabled value="{$_POST["resolucion"]}">
                            <span class="omrs-input-label">Resolución de impresión</span>
                            <div>
                                <output name="dpi" for="resolucion">150</output>
                                <span class="texto-cualquiera">dpi</span>
                            </div>
                            <span class="omrs-input-helper">dpi = <em>dots per inch</em> = puntos por pulgada</span>
                        </label>
                    </div>
                    <div class="omrs-input-group">
                        <label class="omrs-input-filled">
                            <select name="album" id="album" disabled>
                                <option disabled value>-- Selecciona una opción --</option>
                                <option value="0" selected>{$_POST["album"]}</option>
                            </select>
                            <span class="omrs-input-label">Álbum de Masthermatika</span>
                            <span class="omrs-input-helper">Elige uno de tus álbumes</span>
                        </label>
                    </div>
                    <div class="omrs-input-group">
                        <label class="omrs-input-filled">
                            <input type="date" name="fecha-recepcion" id="fecha-recepcion" disabled value="{$_POST["fecha-recepcion"]}">
                            <span class="omrs-input-label">Fecha recepción</span>
                            <span class="omrs-input-helper">Establece una fecha de recepción aproximada</span>
                        </label>
                    </div>
                    <div class="omrs-input-group">
                        <label class="omrs-input-filled">
                            <div class="checkbox-wrapper-19">
                                <input type="checkbox" id="cbtest-19" disabled checked>
                                <label for="cbtest-19" class="check-box"></label>
                            </div>
                            <span class="omrs-input-label">Impresión a color</span>
                        </label>
                    </div>
                </form>
            hereDOC;
            ?>
            </section>
        </div>
    </main>
<?php
    require_once "inc/footer.php";
?>
</body>
</html>