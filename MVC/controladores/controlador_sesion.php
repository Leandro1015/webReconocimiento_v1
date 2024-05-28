<?php
    require_once './modelos/m_identificacion.php';

    class Controlador_sesion {
        public $nombre_vista;
        private $identificacion;

        public function __construct() {
            $this->identificacion = new M_identificacion();
        }

        public function mostrarFIS() {
            $this->nombre_vista = './vistas/forminiciosesion';
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

        public function mostrarFRG() {
            $this->nombre_vista = './vistas/registro_form';
        }

        public function registrar() {
            $msj = null;
        
            // Verificar si todos los campos requeridos fueron rellenados
            if (!empty($_POST['idAlumno']) && !empty($_POST['nombre']) && !empty($_POST['correo']) && 
                !empty($_POST['contrasenia']) && !empty($_POST['webReconocimiento'])) {
        
                $idAlumno = $_POST['idAlumno'];
                $nombre = $_POST['nombre'];
                $correo = $_POST['correo'];
                $contrasenia = $_POST['contrasenia'];
                $webReconocimiento = $_POST['webReconocimiento'];
        
                $resultado = $this->identificacion->registrar($idAlumno, $nombre, $correo, $contrasenia, $webReconocimiento);
        
                if ($resultado) {
                    $this->nombre_vista = './vistas/exito';
                } 
                else {
                    $msj = $this->comprobarRegistro($idAlumno, $correo);
                    $this->nombre_vista = './vistas/registro_form';
                    return $msj;
                }
            } 
            else {
                $msj = "Por favor, complete todos los campos.";
                $this->nombre_vista = './vistas/registro_form';
                return $msj;
            }
        }
        
        // Función para verificar duplicados en la base de datos
        public function comprobarRegistro($idAlumno, $correo) {
            $msj = null;
        
            $sql = "SELECT idAlumno, correo FROM alumno WHERE idAlumno='$idAlumno' OR correo='$correo'";
            $resultado = $this->identificacion->conexion->query($sql);
        
            if ($resultado->num_rows > 0) {
                $fila = $resultado->fetch_assoc();
                if ($fila['idAlumno'] === $idAlumno && $fila['correo'] === $correo) {
                    $msj = "El correo y el ID de alumno ya están registrados. Por favor, utilice otros datos.";
                } 
                else
                    if ($fila['idAlumno'] === $idAlumno) {
                        $msj = "El ID de alumno ya está registrado. Por favor, utilice otro ID.";
                } 
                else
                    if ($fila['correo'] === $correo) {
                        $msj = "El correo ya está registrado. Por favor, utilice otro correo.";
                }
            } 
            else {
                $msj = "Error al registrar el alumno. Por favor, inténtelo de nuevo.";
            }
        
            return $msj;
        }
    }
