<?php
require_once('funciones.php');
require_once('conexion.php');

if (!isset($_POST['fecha']) || empty($_POST['fecha'])) {
    die("Error: La fecha es obligatoria");
}

//Capturamos los datos del formulario
$fecha = $_POST['fecha'];
$presentes = $_POST['asistencia'] ?? [];

// Traemos todos los alumnos
$alumnos = leerAlumnos();

foreach ($alumnos as $alumno) {
    $matricula = $alumno['matricula'];
    $estado = isset($presentes[$matricula]) ? 'P' : 'A';

    // Busco el id del alumno
    $sqlAlumno = "SELECT id FROM alumnos WHERE matricula = ?";
    $stmt = $conn->prepare($sqlAlumno);
    $stmt->bind_param("i", $matricula);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($fila = $resultado->fetch_assoc()) {
        $alumno_id = $fila['id'];

        // Inserto asistencia
        $sqlInsert = "INSERT INTO asistencias (alumno_id, fecha, estado) VALUES (?, ?, ?)";
        $stmt2 = $conn->prepare($sqlInsert);
        $stmt2->bind_param("iss", $alumno_id, $fecha, $estado);
        $stmt2->execute();
    }
}

header("Location: ../Asistencia.php?msg=guardado");
exit;
