<?php
    include 'csesion.php';

    $objeto_sesion = new csesion();
    $objeto_sesion -> mostrarFIS();
    
    include $objeto_sesion->nombre_vista; //esto genera el codigo:  include 'forminiciosesion.php';

?>