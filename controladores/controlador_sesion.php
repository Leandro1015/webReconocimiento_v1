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
        if (!empty($_POST['correo']) && !empty($_POST['contrasenia'])) {
            $correo = $_POST['correo'];
            $contrasenia = $_POST['contrasenia'];
            $resultado = $this->identificacion->iniciarSesion($correo, $contrasenia);
            
            if ($resultado) {
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                $_SESSION['numAlumno'] = $resultado['num_Alumno']; 
                $this->nombre_vista = './vistas/inicio';
            } else {
                $msj = "Correo y/o contraseña incorrectos.";
                $this->nombre_vista = './vistas/forminiciosesion';
                return $msj;
            }
        } else { 
            $msj = "Por favor, complete todos los campos.";
            $this->nombre_vista = './vistas/forminiciosesion';
            return $msj;
        }
    }   

    public function mostrarFRG() {
        $this->nombre_vista = './vistas/registro_form';
    }

    public function cerrarSesion(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        session_destroy();
        $this->nombre_vista = './vistas/forminiciosesion'; // Redirige a la página de inicio de sesión
    }

    public function registrar() {
        if ($this->validarCampos()) {
            $num_Alumno = $_POST['num_Alumno'];
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
            $contrasenia = $_POST['contrasenia'];
            $webReconocimiento = $_POST['webReconocimiento'];

            $msj = $this->identificacion->comprobarRegistro($num_Alumno, $correo);

            if ($msj === "No hay duplicados, puede proceder con el registro.") {
                $resultado = $this->identificacion->registrar($num_Alumno, $nombre, $correo, $contrasenia, $webReconocimiento);

                if ($resultado === true) {
                    $this->nombre_vista = './vistas/forminiciosesion';
                    return null;
                } else {
                    $msj = $resultado;
                }
            } else {
                $this->nombre_vista = './vistas/registro_form';
            }
        } else {
            $msj = "Las contraseñas no coinciden o faltan campos por completar.";
            $this->nombre_vista = './vistas/registro_form';
        }

        return $msj;
    }

    private function validarCampos() {
        if (!empty($_POST['num_Alumno']) && !empty($_POST['nombre']) && !empty($_POST['correo']) && !empty($_POST['contrasenia']) 
            && !empty($_POST['confirmarContrasenia'])) 
        {
            return $_POST['contrasenia'] === $_POST['confirmarContrasenia'];
        } 
        else {
            return false;
        }
    }
}
