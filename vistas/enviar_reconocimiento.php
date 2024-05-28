<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/estilo.css">
        <title>Enviar Reconocimiento</title>
    </head>
    <body>
        <div class="contenedor">
            <h2>Enviar Reconocimiento</h2>
            <form action="index.php?c=Controlador_rec&m=comprobarRec" method="POST">
                <label>Momento:</label><br>
                <input type="text" name="momento"><br><br>

                <label>Descripción:</label><br>
                <textarea name="descripcion"></textarea><br><br>

                <label>Alumno que recibe:</label><br>
                <select name="idAlumnoRecibe">
                    <?php
                        if (isset($datos_vista)) {
                            foreach ($datos_vista as $fila) {
                                echo "<option value='" . $fila['idAlumno'] . "'>" . $fila['nombre'] . "</option>";
                            }
                        } else {
                            echo "<option value=''>No hay alumnos disponibles</option>";
                        }
                    ?>
                </select><br><br>
                <input type="submit" value="Enviar">
            </form>
        </div>
    </body>
</html>
