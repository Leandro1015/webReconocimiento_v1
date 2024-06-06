<?php
    require_once './config/config.php';

    // Verificar si el controlador y el método están definidos en la URL
    if (!isset($_GET["c"]) || !isset($_GET["m"])) {
        $nombre_controlador = CONTROLADOR_POR_DEFECTO;
        $nombre_metodo = METODO_POR_DEFECTO;
    } else {
        $nombre_controlador = $_GET["c"];
        $nombre_metodo = $_GET["m"];
    }

    // Verificar si el parámetro 'id' está presente en la URL
    if (isset($_GET["id"])) {
        // Asignar el valor del parámetro 'id' a la variable $id
        $id = $_GET["id"];
    } else {
        // Si el parámetro 'id' no está presente, asignar null a la variable $id
        $id = null;
    }

    $ruta_controlador = './controladores/' . $nombre_controlador . '.php';

    if (file_exists($ruta_controlador)) {
        require_once $ruta_controlador;
    } else {
        echo "Error: El controlador " . $nombre_controlador . " no existe.";
    }

    require_once $ruta_controlador;
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Crear instancia del controlador y llamar al método correspondiente
    $objetoContr = new $nombre_controlador();

    $datos_vista = $objetoContr->{$nombre_metodo}($id);

    // Obtener el nombre de la vista desde el controlador
    $vista = $objetoContr->nombre_vista . '.php';

    if (file_exists($vista)) {
        require_once $vista;
    } else {
        echo "Error: La vista " . $vista . " no existe.";
    }

    // siempre es un archivo

    // include $objeto_sesion->nombre_vista.'.php'; //esto genera el codigo: ......;
    
    // require_once $nombre_controlador.'.php';
    // Similar a: require_once $_GET["c"].'php';
    // Si el controlador es csesion, sería simalar a: require_once 'csesion.php';
   
    // $objetoContr=new $nombre_controlador();   
    // Similar a: $objetoContr= new $_GET["c"]();
    // Si el controlador es csesion, sería simalar a: $objeto_sesion = new csesion();
    // $objetoContr=new csesion();

    // $objetoContr->{$nombre_metodo}(); //cuando el nombre del metodo es una variable se mete en llaves.
    // Similar a: $objetoContr->$_GET["m"]();
  
    // include $objeto_sesion->nombre_vista; //esto genera el codigo: ......;