<?php
$host = 'localhost';
$usuario = 'root';
$clave = ''; // o la que uses
$bd = 'asistencia_db';

$conn = new mysqli($host, $usuario, $clave, $bd);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}