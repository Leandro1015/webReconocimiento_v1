<?php
    require_once './modelos/m_reconocimiento.php';

    class Controlador_rec {
        public $nombre_vista;
        private $reconocimiento;

        public function __construct() {
            $this->reconocimiento = new M_reconocimiento();
        }
        public function mostrarFREC() {
            $reconocimiento = new M_reconocimiento();
            $datos_vista['alumnos'] = $reconocimiento->obtenerAlumnos();
            $datos_vista['idAlumnoEnvia'] = $_SESSION['idAlumnoEnvia'];
            
            $this->nombre_vista = './vistas/enviar_reconocimiento';
          
            return $datos_vista;
        }
        
        public function comprobarRec() {
            $msj = null;
            if (!empty($_POST['momento']) && !empty($_POST['descripcion']) && !empty($_POST['idAlumnoRecibe'])) {
    
                $idAlumnoEnvia = $_SESSION['idAlumnoEnvia'];
                $momento = $_POST['momento'];
                $descripcion = $_POST['descripcion'];
                $idAlumnoRecibe = $_POST['idAlumnoRecibe'];
               
                $resultado = $this->reconocimiento->enviar($idAlumnoEnvia, $idAlumnoRecibe, $momento, $descripcion);
    
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
        public function verMisReconocimientos() {
            $idAlumnoEnvia = $_SESSION['idAlumnoEnvia'];
            
            $datos_vista['reconocimientos'] = $this->reconocimiento->obtenerReconocimientos($idAlumnoEnvia);
            $this->nombre_vista = './vistas/listado';
            
            return $datos_vista;
        }
    }
