<?php
    require_once './modelos/m_identificacion.php';

    class Controlador_sesion {
        public $nombre_vista;
        public $identificacion;

        public function __construct() {
            $this->identificacion = new M_identificacion();
        }

        public function comprobar() {         
            $msj = null;
            if (!empty($_POST['nombre']) && !empty($_POST['contrasenia'])) {

                $nombre = $_POST['nombre'];
                $contrasenia = $_POST['contrasenia'];

                $resultado = $this->identificacion->iniciarSesion($nombre, $contrasenia);

                if ($resultado) {
                    $this->nombre_vista = './vistas/enviar_reconocimiento';
                } 
                else {
                    $msj = "Usuario y/o contraseña incorrectos.";
                    $this->nombre_vista = './vistas/forminiciosesion';
                    return $msj;
                }
            }
            else { 
                $msj = "Por favor, complete todos los campos.";
                $this->nombre_vista = './vistas/forminiciosesion';
                return $msj;
            }
        }

        public function mostrarFIS() {
            $this->nombre_vista = './vistas/forminiciosesion';
        }
    }
?>
