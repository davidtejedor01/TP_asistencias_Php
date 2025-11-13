<?php
require_once 'conexion.php';

function leerAlumnos()
{
    global $conn;
    $alumnos = [];

    $sql = "SELECT matricula, nombre, apellido FROM alumnos ORDER BY apellido, nombre";
    $resultado = $conn->query($sql);

    if ($resultado && $resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            $alumnos[] = $fila;
        }
    }

    return $alumnos;
}
