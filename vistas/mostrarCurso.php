<?php
/**
 * muestra los datos de los cursos
 */


function crearTabla($datos){
    while ($curso = $datos->fetch_assoc()) {
        echo '<tr>';
        echo    '<td>'.$curso['idCurso'].'</td>';
        echo    '<td>'.$curso['nombre'].'</td>';
        echo '</tr>';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?= vistas.'css/estilos.css' ?>">
    <title>Document</title>
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
        <table>
            <thead>
                <tr>
                    <th>siglas</th>
                    <th>nombre</th>
                </tr>
            </thead>
            <tbody>
                <?php crearTabla($datos) ?>
            </tbody>
        </table>
    </main>
</body>
</html>