-- Base de datos para ABP Semana Ignaciana 1DAW (reconocimientos a alumnos), Módulos: LLMM y BBDD
-- CREATE DATABASE abpSemIgnacian1daw DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
-- USE abp1dawbbddllmm;

-- Tabla alumno
CREATE TABLE alumno (
  num_Alumno tinyint unsigned NOT NULL, -- Número de alumno en clase
  nombre varchar(80) NOT NULL,
  correo varchar(255) NOT NULL,
  contrasenia varchar(100) NOT NULL,
  webReconocimiento varchar(50),
  constraint pk_usuario PRIMARY KEY (num_Alumno),
  constraint correo_unico UNIQUE(correo),
  constraint WEB_unicA UNIQUE(webReconocimiento)  
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Tabla reconocimiento
CREATE TABLE reconocimiento (
    idReconocimiento smallint unsigned AUTO_INCREMENT,
    momento varchar(100) NOT NULL,
    descripcion varchar(255) NOT NULL,
    idAlumEnvia tinyint unsigned NOT NULL,
    idAlumRecibe tinyint unsigned NOT NULL,
	  constraint pk_recon PRIMARY KEY (idReconocimiento),
    constraint fk_alumno_env FOREIGN KEY (idAlumEnvia) REFERENCES alumno(num_Alumno),
    constraint fk_alumno_rec FOREIGN KEY (idAlumRecibe) REFERENCES alumno(num_Alumno)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE INDEX ix_alumno_nombre ON alumno(nombre);

/*INSERT INTO alumno (num_Alumno, nombre, correo, contrasenia, webReconocimiento) VALUES
(1, 'Juan', 'juanperez1@gmail.com', 'password123', 'www.juanperez.com'),
(2, 'María', 'maria.garcia2@gmail.com', 'securepass', 'www.mariagarcia.com'),
(3, 'Pedro', 'pedro.lopez3@gmail.com', 'mypass123', NULL),
(4, 'Ana', 'anamartinez4@gmail.com', 'abc123', 'www.anamartinez.com'),
(5, 'Carlos', 'carlosr5@gmail.com', 'password', NULL),
(6, 'Laura', 'lauras6@gmail.com', '123456', 'www.laurasanchez.com'),
(7, 'Diego', 'diego.gomez7@gmail.com', 'password321', NULL),
(8, 'Sofía', 'sfernandez8@gmail.com', 'pass1723', 'www.sofiafernandez.com'),
(9, 'Javier', 'javi.ruiz9@gmail.com', 'securepassword', NULL),
(10, 'Isabel', 'isabelg10@gmail.com', 'abcxyz', 'www.isabelgarcia.com'),
(11, 'Martín', 'martinp11@gmail.com', 'passpass', NULL),
(12, 'Lucía', 'luciamartinez12@gmail.com', 'mysecurepass', 'www.luciamartinez.com'),
(13, 'Alejandro', 'ale.rodriguez13@gmail.com', 'abcdef', NULL),
(14, 'Elena', 'elena.lopez14@gmail.com', 'passwordabc', 'www.elenalopez.com'),
(15, 'Manuel', 'manuel.gomez15@gmail.com', 'securepass123', NULL),
(16, 'Carmen', 'carmen.sanchez16@gmail.com', '123abc', 'www.carmensanchez.com'),
(17, 'Daniel', 'danielf17@gmail.com', 'passpass123', NULL),
(18, 'Natalia', 'nataliap18@gmail.com', 'abc123xyz', 'www.nataliaperez.com'),
(19, 'Pablo', 'pablom19@gmail.com', 'mypassword', NULL),
(20, 'Adriana', 'adriana.ruiz20@gmail.com', 'passwordxyz', 'www.adrianaruiz.com');*/

/*INSERT INTO reconocimiento (momento, descripcion, idAlumEnvia, idAlumRecibe) VALUES
('Logro', 'clase', 'Excelente trabajo en el proyecto final', 5, 12),
('Agradecimiento', 'clase', 'Gracias por tu ayuda en la clase de diseño', 10, 3),
('Reconocimiento', 'clase', 'Has demostrado un gran esfuerzo en tu participación en clase', 14, 8),
('Motivación', 'clase', 'Sigue así, tu progreso es notable', 1, 17),
('Colaboración', 'clase', 'Trabajo en equipo excepcional en el proyecto de Programación', 6, 15);*/