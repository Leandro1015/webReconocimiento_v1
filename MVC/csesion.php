<?php
    require_once 'identificacionV_2.php';

    class csesion {
        public $nombre_vista;

        public function comprobar() {

            if (isset($_POST['nombre']) && !empty($_POST['nombre']) &&
            isset($_POST['contrasenia']) && !empty($_POST['contrasenia'])) {

                $identificacion = new Identificacion();

                $nombre = $_POST['nombre'];
                $contrasenia = $_POST['contrasenia'];

                $resultado = $identificacion->iniciarSesion($nombre, $contrasenia);

                if ($resultado !== false) {
                    echo "¡Usuario y contraseña válidos!";
                } else {
                    $msj = "Usuario o contraseña incorrectos";
                    $this->nombre_vista = 'forminiciosesion.php';
                    return $msj;
                }
            }
        }

        public function mostrarFIS() {
            $this->nombre_vista = 'forminiciosesion.php';
        }
    }