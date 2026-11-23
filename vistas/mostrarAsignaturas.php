<?php
/*
esta vista muestra los datos de las asignaturas con su respectivo curso y profesor
*/

function crearTabla($resultado){
    while ($fila = $resultado->fetch_array()) {
        echo '<tr>';
        echo '<td>'.$fila['idAsignaturas'].'</td>';
        echo '<td>'.$fila['asignatura'].'</td>';
        echo '<td>'.$fila['n_horas'].'</td>';
        echo '<td>'.$fila['curso'].'</td>';
        echo '<td>'.$fila['profesor'].'</td>';
        echo '</tr>';
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= vistas.'css/estilos.css' ?>">
    <title>Asignaturas</title>
</head>
<body>
    <nav>
        <a id="home" href="index.php?"><img src="<?php echo vistas; ?>imagenes/casa-blanca.png" alt=""></a>
        <a href="index.php?controlador=ControladorAsignatura&metodo=mostrarTabla">Asignaturas</a>
        <a href="index.php?controlador=ControladorCurso&metodo=mostrarCursos">Cursos</a>
        <a href="index.php?controlador=ControladorProfesor&metodo=mostrarProfesores">Profesores</a>
        <a href="index.php?controlador=ControladorCurso&metodo=pedirCursosCon">Horarios</a>
    </nav>
    <main>
        <h1>Listado de asignaturas</h1>
        <table>
            <tr>
                <th>Código</th>
                <th>Asignatura</th>
                <th>Horas</th>
                <th>Curso</th>
                <th>Profesor</th>
            </tr>
            <?php crearTabla($datos); ?>
        </table>
    </main>
    
</body>
</html>