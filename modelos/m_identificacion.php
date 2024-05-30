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
                return "Error al registrar alumno: (" . $this->conexion->errno . ") " . $this->conexion->error;
            }
        }

        public function comprobarRegistro($num_Alumno, $correo) {
            $sql = "SELECT num_Alumno, correo FROM alumno WHERE num_Alumno='$num_Alumno' OR correo='$correo'";
            $resultado = $this->conexion->query($sql);
    
            if ($resultado->num_rows > 0) {
                $fila = $resultado->fetch_assoc();
                if ($fila['num_Alumno'] === $num_Alumno && $fila['correo'] === $correo) {
                    return "El correo y el ID de alumno ya están registrados. Por favor, utilice otros datos.";
                } 
                else 
                    if ($fila['num_Alumno'] === $num_Alumno) {
                        return "El ID de alumno ya está registrado. Por favor, utilice otro ID.";
                } 
                else 
                    if ($fila['correo'] === $correo) {
                        return "El correo ya está registrado. Por favor, utilice otro correo.";
                }
            } 
            else {
                return "No hay duplicados, puede proceder con el registro.";
            }
        }
    }
