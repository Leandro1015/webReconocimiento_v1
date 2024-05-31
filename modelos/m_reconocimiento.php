<?php
    require_once 'conexion.php';

    class M_reconocimiento extends Conectar 
    {   
        public function enviar($idAlumnoEnvia, $idAlumnoRecibe, $momento, $descripcion) {
            $sql = "INSERT INTO reconocimiento (idAlumEnvia, idAlumRecibe, momento, descripcion) 
                    VALUES ('$idAlumnoEnvia', '$idAlumnoRecibe', '$momento', '$descripcion')";

            $resultado = $this->conexion->query($sql);

            if ($resultado && $this->conexion->affected_rows > 0) {
                $this->conexion->close();
                return true; 
            } else {
                return "Error al enviar reconocimiento: (" . $this->conexion->errno . ") " . $this->conexion->error;
            }
        }

        public function obtenerAlumnos($idAlumnoEnvia) {
            $sql = "SELECT num_Alumno, nombre FROM alumno WHERE num_Alumno != '$idAlumnoEnvia' ORDER BY num_Alumno";
            $resultado = $this->conexion->query($sql);
            
            $alumnos = [];
            if ($resultado && $resultado->num_rows > 0) {
                while ($fila = $resultado->fetch_assoc()) {
                    $alumnos[] = $fila;
                }
            }
            
            return $alumnos;
        }     

        public function obtenerReconocimientos($num_Alumno) {
           
           $sql = "SELECT idReconocimiento FROM reconocimiento WHERE idAlumRecibe = '$num_Alumno'";
            $resultado = $this->conexion->query($sql);
            
            $reconocimientos = array();

            if ($resultado && $resultado->num_rows > 0) {
                while ($fila = $resultado->fetch_assoc()) {
                    $reconocimientos[] = $fila;
                }
            }

            return $reconocimientos;
        }
    }
