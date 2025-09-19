<?php
require_once('funciones.php');

// Validar que llegó la fecha
if (!isset($_POST['fecha']) || empty($_POST['fecha'])) {
    die("Error: La fecha es obligatoria");
}

$fecha = $_POST['fecha']; // ejemplo: "2025-09-18"
$alumnos = leerAlumnos(); // traigo lista de alumnos
$presentes = $_POST['asistencia'] ?? []; // ejemplo: ['1001' => 'P', '1003' => 'P']

// Construyo las líneas del archivo
$lineas = [];
foreach ($alumnos as $alumno) {
    $matricula = $alumno['matricula'];

    // Si vino marcado en el form → "P", si no → "A"
    $estado = isset($presentes[$matricula]) ? "P" : "A";

    // Ejemplo: "1001,P"
    $lineas[] = "{$matricula},{$estado}";
}

// Creo el archivo dentro de /Archivos con nombre = fecha
$ruta = __DIR__ . '/../Archivos/' . $fecha . '.txt';

// file_put_contents escribe strings en un archivo. 'implode()' convierte el array en string
file_put_contents($ruta, implode("\n", $lineas));

// Mensaje de confirmación
echo "Asistencia guardada en Archivos/$fecha.txt";
echo "<br><a href='../Asistencia.php'>Volver</a>";

header("Location: ../Asistencia.php?msg=guardado");
exit;

