<?php
    require_once 'config.php';
    
    if (!isset($_GET["c"]) || !isset($_GET["m"])) {
        $nombre_controlador = CONTROLADOR_POR_DEFECTO;
        $nombre_metodo = METODO_POR_DEFECTO;
    } else {
        $nombre_controlador = $_GET["c"];
        $nombre_metodo = $_GET["m"];
    }

    require_once $nombre_controlador . '.php';
    
    $objetoContr = new $nombre_controlador();
    $datos_vista = $objetoContr->{$nombre_metodo}();

    require_once $objetoContr->nombre_vista . '.php';
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