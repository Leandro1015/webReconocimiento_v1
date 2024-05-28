<?php
    require_once 'conexion.php';

    class M_identificacion extends Conectar
    {   
        public function iniciarSesion($nombre, $contrasenia)
        {
            // Consulta SQL para buscar el usuario por alumno y contraseña
            $sql = "SELECT num_Alumno, nombre FROM alumno WHERE nombre='$nombre' AND contrasenia='$contrasenia'";
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

        public function registrar($num_Alumno, $nombre, $correo, $contrasenia, $webReconocimiento)
        {
            $sql = "INSERT INTO alumno (num_Alumno, nombre, correo, contrasenia, webReconocimiento) 
                    VALUES ('$num_Alumno', '$nombre', '$correo', '$contrasenia', '$webReconocimiento')";
            
            $resultado = $this->conexion->query($sql);

            if ($resultado && $this->conexion->affected_rows > 0) 
            {
                return true; 
            } 
            else 
            {
                return false; 
            }
        }
    }