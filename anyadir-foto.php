<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Foto - Masthermatika</title>
    <link rel="stylesheet" href="css/global/style.css">
    <link rel="stylesheet" href="css/ordenador/style.css">
    <link rel="stylesheet" href="css/tablet/style.css">
    <link rel="stylesheet" href="css/movil/style.css">
    <link rel="stylesheet" href="css/global/registro.css">
    <link rel="stylesheet" href="css/ordenador/registro.css">
    <link rel="stylesheet" href="css/tablet/registro.css">
    <link rel="stylesheet" href="css/movil/registro.css">
</head>
<?php
        include_once "inc/header.php";

        //Consulta oara obtener los datos
        $id = mysqli_connect("","root","","daw");
    if(mysqli_connect_errno()) {
        echo mysqli_connect_error();
        exit();
    }

    $result = mysqli_query($id, "
        SELECT * 
        FROM albumes
    ");
?>
<body>
    <main>
        <div id="creacion-cuenta">
            <h1>Añadir foto</h1>
            <form action="" method="post" id="tab-reg">
                <section id="reg-1">
                    <h2>Introduce la información de la foto:</h2>
                    <div class="omrs-input-group">
                        <label class="omrs-input-filled">
                            <input type="text" placeholder=" " name="titulo" id="titulo">
                            <span class="omrs-input-label">Titulo</span>
                        </label>
                    </div>
                    <div class="omrs-input-group">
                        <label class="omrs-input-filled">
                            <input type="text" placeholder=" " name="descripcion" id="descripcion">
                            <span class="omrs-input-label">Descripción</span>
                        </label>
                    </div>
                    <div class="omrs-input-group">
                        <label class="omrs-input-filled">
                            <input type="date" placeholder=" " name="fecha" id="fecha">
                            <span class="omrs-input-label">Fecha</span>
                        </label>
                    </div>
                    <div class="omrs-input-group">
                        <label class="omrs-input-filled">
                            <input type="text" placeholder=" " name="pais" id="pais">
                            <span class="omrs-input-label">País</span>
                        </label>
                    </div>
                    <div class="omrs-input-group">
                        <label class="omrs-input-filled">
                            <input type="text" name="texalt" id="texalt">
                            <span class="omrs-input-label">Texto Alternativo</span>
                        </label>
                    </div>
                    <div class="omrs-input-group">
                        <label class="omrs-input-filled">
                            <p>Álbum</p>
                            <select name="album" id="album">
                                <?php

                                if(!isset($_GET["id"])) {
                                    echo '<option selected value="Selecciona una opcion">-- Selecciona una opción --</option>';
                                    
                                    while($row = mysqli_fetch_array($result)) {
                                        echo <<<hereDOC
                                        <option value="{$row["Titulo"]}">{$row["Titulo"]}</option>
                                        hereDOC;
                                    }
                                }

                                else{
                                    while($row = mysqli_fetch_array($result)) {
                                        if($row["IdAlbum"] == $_GET["id"]) {
                                            echo <<<hereDOC
                                            <option selected value="{$row["Titulo"]}">{$row["Titulo"]}</option>
                                            hereDOC;
                                        }

                                        else{
                                            echo <<<hereDOC
                                            <option value="{$row["Titulo"]}">{$row["Titulo"]}</option>
                                            hereDOC;
                                        }
                                    }
                                }
                                ?>
                            </select>
                        </label>
                    </div>
                </section>
            </form>
        </div>
        <!--Cambiar cuando haya tiempo-->
        <br><br>
    </main>
</body>
<?php
        include_once "inc/footer.php";
?>
</html>