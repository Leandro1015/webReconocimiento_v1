<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/estilo.css">
        <title>Formulario de Registro del Alumno</title>
    </head>
    <body>    
        <div class="contenedor">
            <h2>Registro</h2>
            <form action="index.php?c=Controlador_sesion&m=registrar" method="post">
                <label>Numero de Alumno:</label><br>
                <input type="number" name="num_Alumno"><br><br>

                <label>Nombre:</label><br>
                <input type="text" name="nombre"><br><br>

                <label>Correo Electrónico:</label><br>
                <input type="email" name="correo"><br><br>

                <label>Contraseña:</label><br>
                <input type="password" name="contrasenia"><br><br>

                <label>Confirmar Contraseña:</label><br>
                <input type="password" name="confirmarContrasenia"><br><br>

                <label>Página Web de Reconocimiento:</label><br>
                <input type="text" name="webReconocimiento"><br><br>

                <input type="submit" value="Enviar">
            </form>
            <?php 
                if (isset($datos_vista)) { 
                    echo "<p class='error-message'>" . $datos_vista . "</p>";
                } 
            ?>
        </div>
    </body>
</html>