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
            <form action="#" method="POST">
                <label>Momento:</label><br>
                <input type="text" name="momento"><br><br>

                <label>Descripción:</label><br>
                <textarea name="descripcion"></textarea><br><br>

                <label>Alumno que recibe:</label><br>
                <select name="alumnoNombre">
                    <?php
                     while ($fila["nombre"] = ()) {
                         echo "<option value='" . $fila['idAlumno'] . "'>" . $fila['nombre'] . "</option>";
                    }


                        /*require_once '../conexion.php';
                        $conectarInstancia = new Conectar();
                        $conexion = $conectarInstancia -> conexion;

                        $sql = "SELECT idAlumno, nombre FROM alumno";
                        $resultado = $conexion->query($sql);
                    
                        if ($resultado->num_rows > 0) {
                            while ($fila = $resultado->fetch_assoc()) {
                                echo "<option value='" . $fila['idAlumno'] . "'>" . $fila['nombre'] . "</option>";
                            }
                        } else {
                            echo "<option value=''>No hay alumnos disponibles</option>";
                        }*/
                    ?>
                </select><br><br>
                <input type="submit" value="Enviar">
            </form>
        </div>
    </body>
</html>
