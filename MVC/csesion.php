<?php
    require_once 'm_identificacion.php';

    class Csesion {
        public $nombre_vista;
        public $identificacion;

        public function __construct() {
            $this->identificacion = new M_identificacion();
        }

        public function comprobar() {
            if (isset($_POST['nombre']) && !empty($_POST['nombre']) &&
            isset($_POST['contrasenia']) && !empty($_POST['contrasenia'])) {

                $nombre = $_POST['nombre'];
                $contrasenia = $_POST['contrasenia'];

                $resultado = $this->identificacion->iniciarSesion($nombre, $contrasenia);

                if ($resultado !== false) {
                    echo "¡Usuario y contraseña válidos!";
                } else {
                    $msj = "Usuario o contraseña incorrectos";
                    $this->nombre_vista = 'forminiciosesion';
                    return $msj;
                }
            }
        }

        public function mostrarFIS() {
            $this->nombre_vista = 'forminiciosesion';
        }
    }