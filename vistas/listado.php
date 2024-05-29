<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/estilo.css">
        <title>Lista de Reconocimientos</title>
    </head>
    <body>
        <div class="contenedor">
            <h2>Lista de Reconocimientos</h2>
            <ul>
                <?php
                    $i = 1;
                    foreach ($datos_vista['reconocimientos'] as $reconocimiento) {
                        echo "<li>";
                        echo "<a href='./vistas/verMiReconocimiento.php?id=" . $reconocimiento['idReconocimiento'] . "'>";
                        echo "Reconocimiento " . $i;
                        echo "</a>";
                        echo "</li>";
                        $i++;
                    }
                ?>
            </ul>
        </div>
    </body>
</html>
