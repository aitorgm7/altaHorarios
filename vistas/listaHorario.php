<?php

/*
    muestra los cursos con el horario ya creado
    con la opcion de ver el horario o crear otro nuevo
*/

    function mostrar($datos){
        if ($datos->num_rows == 0) {
            echo "<p>No hay clases con el horario guardado</p>";
        }
        else{
            echo "<table>";
            echo     "<thead>";
            echo         "<tr>";
            echo             "<th>clase con horario</th>";
            echo             "<th>opciones</th>";
            echo         "</tr>";
            echo     "</thead>";
            echo     "<tbody>";
                    while($curso=$datos->fetch_array()){
                        echo "<tr>";
                            echo "<td>".$curso['nombre']." (".$curso['idCurso'].")</td>";
                            echo '<td><form action="index.php?controlador=ControladorHorario&metodo=verHorario" method="post"><input type="text" name="idCurso" hidden value="'.$curso['idCurso'].'"><input id="sin-posicion" type="submit" value="👀"></form></td>';
                        echo "</tr>";
                    }
            echo     "</tbody>";
            echo "</table>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Listar Horarios</title>
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
    <main>        
        <a href="index.php?controlador=ControladorCurso&metodo=pedirCursos">Añadir Horario</a>
        <?php
            mostrar($datos);
        ?>
    </main>
</body>
</html>