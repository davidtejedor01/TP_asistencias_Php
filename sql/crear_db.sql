CREATE DATABASE IF NOT EXISTS asistencia_db;
USE asistencia_db;

CREATE TABLE alumnos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    matricula INT NOT NULL UNIQUE,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL
);

CREATE TABLE asistencias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    alumno_id INT NOT NULL,
    fecha DATE NOT NULL,
    estado ENUM('P', 'A') NOT NULL,
    FOREIGN KEY (alumno_id) REFERENCES alumnos(id)
);