<?php
    require_once "helpers/funciones.php";
    session_start();

    generarHead('accesibilidad');
?>
<body>
    <?php
        $fila = $_SESSION["usuario"] ?? null;
        if($fila && $fila == 'sergiolujanmora') {
            echo codigoMisterioso();
        }
        require_once "inc/header.php";
    ?>
    <main>
        <h1>Declaración de accesibilidad</h1>
        <p>El Ministerio de la Presidencia, Relaciones con las Cortes y Memoria Democrática se ha comprometido a hacer accesible este sitio web de conformidad con el Real Decreto 1112/2018, de 7 de septiembre, sobre accesibilidad de los sitios web y aplicaciones para dispositivos móviles del sector público.</p>
        <section>
            <h2>Situación de cumplimiento</h2>
            <p>Este sitio web es parcialmente conforme con el RD 1112/2018 debido a las excepciones y a la falta de conformidad de los aspectos que se indican a continuación.</p>
        </section>
        <section>
            <h2>Contenido no accesible</h2>
            <p>El contenido que se recoge a continuación no es accesible por lo siguiente:</p>
            <ul>
                <li><strong>Falta de conformidad con el RD 1112/2018</strong>
                    <ul>
                        <li>Debido a la automatización de algunas de las publicaciones podrían existir páginas con un incorrecto anidamiento de etiquetas HTML.</li>
                        <li>Existen documentos en formato PDF que no cumplen con la normativa existiendo en algunos de ellos, una alternativa textual HTML que cumple la normativa.</li>
                        <li>En el portal pueden existir contenidos en otros idiomas en los que no está etiquetado correctamente el cambio de idioma.</li>
                    </ul>
                </li>
                <li><strong>Carga desproporcionada</strong>
                    <ul>
                        <li>No aplica.</li>
                    </ul>
                </li>
                <li>Contenido que <strong>no entra dentro del ámbito de la legislación</strong> aplicable
                    <ul>
                        <li>Debido a la antigüedad de la web y al volumen de documentos publicados, podrían existir documentos en PDF u otros formatos ofimáticos, así como páginas en HTML, publicados antes del 20 de septiembre de 2018 que no cumplen en su totalidad todos los requisitos de accesibilidad.</li>
                    </ul>
                </li>
            </ul>
        </section>
        <section>
            <h2>Preparación de la presente declaración de accesibilidad</h2>
            <p>La presente declaración de accesibilidad fue preparada el 7 de mayo de 2019. El método empleado para la presente declaración ha sido una autoevaluación realizada por el propio Ministerio. Última revisión de la declaración: 29 de Septiembre de 2022.</p>
        </section>
        <section>
            <h2>Observaciones y datos de contacto</h2>
            <p>Puede realizar comunicaciones sobre requisitos de accesibilidad (artículo 10.2.a del RD 1112/2018) como por ejemplo:</p>
            <ul>
                <li>informar sobre cualquier posible incumplimiento por parte de este sitio web</li>
                <li>transmitir otras <strong>dificultades de acceso</strong> al contenido</li>
                <li>formular cualquier otra <strong>consulta o sugerencia de mejora</strong> relativa a la accesibilidad del sitio web</li>
            </ul>
        </section>
        <section>
            <h2>Procedimiento de aplicación</h2>
            <p>El procedimiento de reclamación recogido en el artículo 13 del RD 1112/2018, puede iniciarse a través de este enlace.</p>
        </section>
        <section>
            <h2>Contenido opcional</h2>
            <p>Este sitio web:</p>
            <ul>
                <li>se ha diseñado adaptándose a los estándares y normativas vigentes en relación a la accesibilidad, cumpliendo con los puntos de verificación de prioridad 2 (AA) definidos en la especificación de Pautas de Accesibilidad al Contenido en la Web (WCAG 2.1)</li>
                <li>cumple con los requisitos de la Norma UNE-EN 301549:2019, considerando las excepciones del Real Decreto 1112/2018</li>
                <li>está diseñado para su correcta visualización en dispositivos de escritorio, tablet y móviles para una resolución mínima de <strong></strong>1280x1024</li>
                <li>se ha realizado utilizando HTML5 como lenguaje de marcado y hojas de estilo CSS 3 para su diseño</li>
                <li>está diseñado para su uso con javascript no intrusivo ofreciendo, en el caso de que su navegador no lo soporte, su correspondiente alternativa no javascript</li>
            </ul>
        </section>
        <section>
            <h2>Tamaño del texto</h2>
            <p>Se han utilizado fuentes con tamaños relativos de forma que si el usuario prefiere una fuente mayor podrá seleccionarla a través de las opciones de tamaño de texto de su explorador, generalmente Ctrl+ (control más) para ampliar, Ctrl- (control menos) para reducir.</p>
        </section>
    </main>
    <?php
        require_once "inc/footer.php";
    ?>
</body>
</html>
