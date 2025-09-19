<?php

/*Lee el archivo 'Alumnos.txt' y devuelve un array de alumnos */
function leerAlumnos()
{
    $ruta = __DIR__ . "/../Archivos/Alumnos.txt";
    $alumnos = [];

    // si el archivo no existe, retorna array vacío
    if (!file_exists($ruta))
        return $alumnos;

    // lee el archivo y devuelve un array de strings. 
    // FLAG: ignora \n y líneas vacías
    $lineas = file($ruta, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lineas as $linea) {
        $partes = explode(',', $linea); // explode: divide la línea en partes

        if (count($partes) === 3) {
            // Array asociativo
            $alumnos[] = [
                'matricula' => trim($partes[0]),
                'nombre' => trim($partes[1]),
                'apellido' => trim($partes[2])
            ];
        }
    }

    return $alumnos;
}