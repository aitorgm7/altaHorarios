<?php
/*
esta vista elige el curso sin horario para hacerselo
*/


function mostrarCursos($resultado){
    while ($curso = $resultado->fetch_assoc()) {
        echo '<option value="'.$curso['idCurso'].'">'.$curso['nombre'].'</option>';
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
        <form action="index.php?controlador=ControladorHorario&metodo=devolverDatosAltaHorario" method="post">
            <label for="">elige el curso</label>
            <select name="curso" id="">
                <?php mostrarCursos($datos);?>
            </select>
            <input type="submit" value="Elegir">
        </form>
    </main>
</body>
</html>