<?php
    include 'conexion2.php';

    class Identificacion extends Conectar
    {   
        public function iniciarSesion($nombre, $contrasenia)
        {
            // Consulta SQL para buscar el usuario por alumno y contraseña
            $sql = "SELECT idAlumno, nombre FROM alumno WHERE nombre='$nombre' AND contrasenia='$contrasenia'";
            $resultado = $this->conexion->query($sql);

            // Verificar si se encontró un usuario
            if ($resultado->num_rows == 1){
                $fila = $resultado->fetch_assoc();
                return $fila;
            } 
            else {
                return false;
            }
        }
    }
