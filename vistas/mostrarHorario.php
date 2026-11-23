<?php
/**
 * muestra el horario guardado del curso seleccionado 
 */
function crearTabla($datos){
    $horas=["8.15","9.10","10.05","11.30","12.25","13.20","14.15"];
    for($i=0;$i<7;$i++){
        echo '<tr>';
        if($i==3){
            echo '<td>11.00</td>';
            echo '<td>RECREO</td>';
            echo '<td>RECREO</td>';
            echo '<td>RECREO</td>';
            echo '<td>RECREO</td>';
            echo '<td>RECREO</td>';
            echo '</tr>';
            echo '<tr>';
        }
        echo '<th>'.$horas[$i].'</th>';
        $c=1;
        while($hora = $datos->fetch_array()){
            echo '<td>'.$hora['idAsignatura'].' - '.$hora['nombre'].'</td>'; 
            $c++;
            if($c==6){
                break;
            }
        }
        echo '</tr>';
    }
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>controlador de horarios</title>
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
        <table>
            <thead>
                <tr>
                    <th></th>
                    <th>Lunes</th>
                    <th>Martes</th>
                    <th>Miércoles</th>
                    <th>Jueves</th>
                    <th>Viernes</th>
                </tr>
            </thead>
            <tbody>
                <?php crearTabla($datos); ?>
            </tbody>
        </table>
    </main>
</body>
</html>