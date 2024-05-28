<?php
    require_once 'conexion.php';

    class M_reconocimiento extends Conectar
    {   
        public function enviar($idAlumnoRecibe, $momento, $descripcion)
        {
            $sql = "INSERT INTO reconocimientos (idAlumRecibe, momento, descripcion) 
                    VALUES ('$idAlumnoRecibe', '$momento', '$descripcion')";

            $resultado = $this->conexion->query($sql);

            if ($resultado && $this->conexion->affected_rows > 0) {
                $this->conexion->close();
                return true; 
            } 
            else {
                // Devuelve un mensaje de error detallado si la consulta falla
                return "Error al enviar reconocimiento: (" . $this->conexion->errno . ") " . $this->conexion->error;
            }
        }
    }