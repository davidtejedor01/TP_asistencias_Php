<?php
require_once "php/funciones.php";
$alumnos = leerAlumnos();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Toma de Asistencia</title>
</head>

<body>
    <div class="card">
        <h1>Toma de Asistencia</h1>

        <?php if (isset($_GET['msg']) && $_GET['msg'] == 'guardado'): ?>
            <p class="success">Asistencia guardada correctamente ✅</p>
        <?php endif; ?>

        <form action="php/ProcesarDatos.php" method="post">
            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha" name="fecha" required>
            </div>

            <h2>Lista de alumnos</h2>

            <div class="alumnos-list">
                <?php foreach ($alumnos as $alumno): ?>
                    <div class="alumno-item">
                        <span class="alumno-info">
                            <?= htmlspecialchars($alumno['apellido']) ?>, <?= htmlspecialchars($alumno['nombre']) ?>
                        </span>
                        <span>
                            <input type="checkbox" name="asistencia[<?= $alumno['matricula'] ?>]" value="P">
                            Presente
                        </span>
                    </div>
                <?php endforeach; ?>
            </div>

            <button type="submit">Guardar Asistencia</button>
            <button type="reset" class="btn-secundario">Limpiar</button>
        </form>
    </div>
</body>

</html>