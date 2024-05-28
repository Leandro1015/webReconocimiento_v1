<?php
    require_once './modelos/m_reconocimiento.php';

    class Controlador_rec {
        public $nombre_vista;
        private $reconocimiento;

        public function __construct() {
            $this->reconocimiento = new M_reconocimiento();
        }

        public function mostrarFREC() {
            $this->nombre_vista = './vistas/enviar_reconocimiento';
        }

        public function comprobarRec() {         
            $msj = null;
            if (!empty($_POST['momento']) && !empty($_POST['descripcion']) && !empty($_POST['idAlumnoRecibe'])) {

                $momento = $_POST['momento'];
                $descripcion = $_POST['descripcion'];
                $idAlumnoRecibe = $_POST['idAlumnoRecibe'];

                $resultado = $this->reconocimiento->enviar($idAlumnoRecibe, $momento, $descripcion);

                if ($resultado) {
                    $this->nombre_vista = './vistas/exito';
                } else {
                    $msj = "Hubo un error al enviar el reconocimiento.";
                    $this->nombre_vista = './vistas/enviar_reconocimiento';
                }
            } else { 
                $msj = "Por favor, complete todos los campos.";
                $this->nombre_vista = './vistas/enviar_reconocimiento';
            }

            return $msj;
        }
    }

