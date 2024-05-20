<?php
    if (!isset($_GET["c"])) {
       $nombre_controlador = csesion;
       $nombre_metodo = mostrarFIS;
    } else {
        $nombre_controlador = $_GET["c"];
        $nombre_metodo = $_GET["m"];    
    }

    require_once $nombre_controlador . '.php';
        
    $objetoContr = new $nombre_controlador();
    $algo=$objetoContr->{$nombre_metodo}();

    $vista=$objetoContr->nombre_vista.'.php';
    echo $vista; // siempre es un archivo
    //si existe el archivo de la vista
    //require_once $vista;

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