<?php
require_once 'funciones.php';

if (!isset($_POST['fecha']) || empty($_POST['fecha'])) {
    die("Error: La fecha es obligatoria");
}

$fecha = $_POST['fecha'];
$presentes = $_POST['asistencia'] ?? [];

guardarAsistencias($fecha, $presentes);

header("Location: ../Asistencia.php?msg=guardado");
exit;