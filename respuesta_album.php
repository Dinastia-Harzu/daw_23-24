<?php
    session_start();
    if(!isset($_SESSION["usuario"])) {
        header("Location: index.no_registrado.php");
    }
    $tema = isset($_SESSION["tema"]) ? $_SESSION["tema"] : "oscuro";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Título imagen - Masthermatika</title>
    <link rel="stylesheet" href="css/global/style.css">
    <link rel="stylesheet" href="css/ordenador/style.css">
    <link rel="stylesheet" href="css/tablet/style.css">
    <link rel="stylesheet" href="css/movil/style.css">
    <link rel="stylesheet" href="css/global/album.css">
    <link rel="stylesheet" href="css/ordenador/album.css">
    <link rel="stylesheet" href="css/tablet/album.css">
    <link rel="stylesheet" href="css/movil/album.css">
    <?php
        echo '<link rel="stylesheet" href="css/modos-alternativos/' . $tema . '.css">';
    ?>
    <link rel="stylesheet" href="css/impresion/style.css" media="print">
    <link rel="stylesheet" href="css/impresion/respuesta_album.css" media="print">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php
    include_once "inc/header-no-registrado.php";
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
                <?php include_once 'tabla-album.php'; ?>
            </aside>
            <section>
                <h2>Formulario de solicitud</h2>
                <p>Rellena el siguiente formulario aportando todos los detalles para confeccionar tu álbum</p>
                <form action="#">
                    <div class="omrs-input-group">
                        <label class="omrs-input-filled">
                            <input type="text" placeholder=" " name="nombre" id="nombre" disabled value="Mi nuevo álbum">
                            <span class="omrs-input-label">Nombre</span>
                            <span class="omrs-input-helper">Tu nombre</span>
                        </label>
                    </div>
                    <div class="omrs-input-group">
                        <label class="omrs-input-filled">
                            <input type="text" placeholder=" " name="titulo" id="titulo" disabled value="Inserta texto">
                            <span class="omrs-input-label">Título</span>
                            <span class="omrs-input-helper">El título para el álbum impreso</span>
                        </label>
                    </div>
                    <div class="omrs-input-group">
                        <label class="omrs-input-filled">
                            <textarea placeholder=" " name="texto-adicional" id="texto-adicional" rows="10" maxlength="4000" disabled value="Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, neque itaque atque quae qui saepe doloribus assumenda sint exercitationem ullam dolor distinctio aspernatur alias natus, cum numquam minima, amet recusandae."></textarea>
                            <span class="omrs-input-label">Texto adicional</span>
                            <span class="omrs-input-helper">Hasta 4000 caracteres</span>
                        </label>
                    </div>
                    <div class="omrs-input-group">
                        <label class="omrs-input-filled">
                            <input type="email" placeholder=" " name="correo" id="correo" disabled value="debug@correo.es">
                            <span class="omrs-input-label">Correo electrónico</span>
                        </label>
                    </div>
                    <fieldset>
                        <legend>Dirección</legend>
                        <div class="omrs-input-group">
                            <label class="omrs-input-filled">
                                <input type="text" name="direccion" id="direccion" placeholder=" " disabled value="Bulevard del plà">
                                <span class="omrs-input-label">Dirección</span>
                                <span class="omrs-input-helper">La calle, avenida, bulevar, etc.</span>
                            </label>
                        </div>
                        <div class="omrs-input-group">
                            <label class="omrs-input-filled">
                                <input type="number" name="numero" id="numero" placeholder=" " disabled value="23">
                                <span class="omrs-input-label">Número</span>
                            </label>
                        </div>
                        <div class="omrs-input-group">
                            <label class="omrs-input-filled">
                                <input type="text" name="cp" id="cp" placeholder=" " disabled value="01205">
                                <span class="omrs-input-label">Código postal</span>
                            </label>
                        </div>
                        <div class="omrs-input-group">
                            <label class="omrs-input-filled">
                                <input type="text" name="ciudad" id="ciudad" placeholder=" " disabled value="Elche">
                                <span class="omrs-input-label">Ciudad</span>
                            </label>
                        </div>
                        <div class="omrs-input-group">
                            <label class="omrs-input-filled">
                                <input type="text" name="provincia" id="provincia" placeholder=" " disabled value="Alicante">
                                <span class="omrs-input-label">Provincia</span>
                            </label>
                        </div>
                        <div class="omrs-input-group">
                            <label class="omrs-input-filled">
                                <input type="text" name="pais" id="pais" placeholder=" " disabled value="España">
                                <span class="omrs-input-label">País</span>
                            </label>
                        </div>
                    </fieldset>
                    <div class="omrs-input-group">
                        <label class="omrs-input-filled">
                            <input type="tel" placeholder=" " name="telefono" id="telefono" disabled value="+34 965903400 x 2962">
                            <span class="omrs-input-label">Teléfono</span>
                            <span class="omrs-input-helper">El número de teléfono al que contactar</span>
                        </label>
                    </div>
                    <div class="omrs-input-group">
                        <label class="omrs-input-filled" id="swatch">
                            <input type="color" id="color" name="color" disabled>
                            <span class="omrs-input-label">Color de la portada</span>
                        </label>
                    </div>
                    <div class="omrs-input-group">
                        <label class="omrs-input-filled">
                            <input type="number" placeholder=" " name="copias" id="copias" min="1" value="1" disabled>
                            <span class="omrs-input-label">Número de copias</span>
                            <span class="omrs-input-helper">Mínimo una copia</span>
                        </label>
                    </div>
                    <div class="omrs-input-group">
                        <label class="omrs-input-filled">
                            <input type="range" placeholder=" " name="resolucion" id="resolucion" step="150" min="150" max="900" value="150" disabled>
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
                                <option value="0" selected>Mis álbumes</option>
                            </select>
                            <span class="omrs-input-label">Álbum de Masthermatika</span>
                            <span class="omrs-input-helper">Elige uno de tus álbumes</span>
                        </label>
                    </div>
                    <div class="omrs-input-group">
                        <label class="omrs-input-filled">
                            <input type="date" name="fecha-recepcion" id="fecha-recepcion" disabled value="2023-10-27">
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
            </section>
        </div>
    </main>
<?php
    include_once "inc/footer.php";
?>
</body>
</html>