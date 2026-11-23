<!--
esta vista muestra que ha pasado con el estado de guardado del horario
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="<?= vistas.'css/estilos.css' ?>">
</head>
<body>
    <nav>
        <a id="home" href="index.php?"><img src="<?php echo vistas; ?>imagenes/casa-blanca.png" alt=""></a>
        <a href="index.php?controlador=ControladorAsignatura&metodo=mostrarTabla">Asignaturas</a>
        <a href="index.php?controlador=ControladorCurso&metodo=mostrarCursos">Cursos</a>
        <a href="index.php?controlador=ControladorProfesor&metodo=mostrarProfesores">Profesores</a>
        <a href="index.php?controlador=ControladorCurso&metodo=pedirCursosCon">Horarios</a>
    </nav>
    <p><?php echo $datos; ?></p>

    <a href="index.php?controlador=ControladorCurso&metodo=pedirCursosCon">Volver</a>
</body>
</html>