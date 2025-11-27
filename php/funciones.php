<?php
require_once 'conexion.php';

function leerAlumnos()
{
    global $conn;
    $alumnos = [];

    $sql = "SELECT * FROM alumnos ORDER BY apellido, nombre";
    $resultado = $conn->query($sql);

    if ($resultado && $resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            $alumnos[] = $fila;
        }
    }

    return $alumnos;
}

function guardarAsistencias($fecha, $presentes)
{
    global $conn;

    $alumnos = leerAlumnos();

    foreach ($alumnos as $alumno) {
        $alumno_id = $alumno['id'];
        $matricula = $alumno['matricula'];
        $estado = isset($presentes[$matricula]) ? 'P' : 'A';

        $sql = "INSERT INTO asistencias (alumno_id, fecha, estado) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iss", $alumno_id, $fecha, $estado);
        $stmt->execute();
        $stmt->close();
    }
}

