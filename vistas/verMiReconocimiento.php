<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/estilo.css">
    <title>Detalles del Reconocimiento</title>
</head>
<body>
    <div class="contenedor">
        <h2>Detalles del Reconocimiento</h2>
        <?php
            if (!empty($datos_vista['reconocimiento'])) {
                $reconocimiento = $datos_vista['reconocimiento'];
                echo "<p>Momento: " . $reconocimiento['momento'] . "</p>";
                echo "<p>Descripción: " . $reconocimiento['descripcion'] . "</p>";
            } 
            else {
                echo "<p>Error: No se encontraron detalles de reconocimiento.</p>";
            }
        ?>
    </div>
</body>
</html>
