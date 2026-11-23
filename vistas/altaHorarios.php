<?php
/*
esta vista crea el horario de un curso
*/


function selectAsignaturas($dia,$resultado){
    $resultado->data_seek(0);
    echo '<select name="'.$dia.'[]" id="">';
    while ($fila = $resultado->fetch_array()){
        echo '<option value="'.$fila['siglas'].'">'.$fila['siglas'].'</option>';
    }
    echo '</select>';
}

function selectProfesor($dia,$resultado){
    $resultado->data_seek(0);
    echo '<select name="'.$dia.'[]" id="">';
    while ($fila = $resultado->fetch_array()){
        echo '<option value="'.$fila['idProfesor'].'">'.$fila['nombre'].'</option>';
    }
    echo '</select>';
}

function crearAltaHorarios($resultado1,$resultado2){
    $horas=["8.15","9.10","10.05","11.00","11.30","12.25","13.20","14.15"];

    for($i=0;$i<7;$i++){
        if($i!=3){
                echo '<tr>';
                echo '<th>'.$horas[$i].'</th>';
                echo '<td>';
                    selectAsignaturas("LA",$resultado1);
                    selectProfesor("LP",$resultado2);
                echo '</td>';
                echo '<td>';
                    selectAsignaturas("MA",$resultado1);
                    selectProfesor("MP",$resultado2);
                echo '</td>';
                echo '<td>';
                    selectAsignaturas("XA",$resultado1);
                    selectProfesor("XP",$resultado2);
                echo '</td>';
                echo '<td>';
                    selectAsignaturas("JA",$resultado1);
                    selectProfesor("JP",$resultado2);
                echo '</td>';
                echo '<td>';
                    selectAsignaturas("VA",$resultado1);
                    selectProfesor("VP",$resultado2);
                echo '</td>';
                echo '</tr>';
            }
            else{
                echo '<tr>';
                echo '<td>'.$horas[$i].'</td>';
                echo '<td>RECREO</td>';
                echo '<td>RECREO</td>';
                echo '<td>RECREO</td>';
                echo '<td>RECREO</td>';
                echo '<td>RECREO</td>';
                echo '</tr>';
            }
    }

    echo '<tr>';
    echo '<th>'.$horas[7].'</th>';
    echo '<td>';
        selectAsignaturas("LA",$resultado1);
        selectProfesor("LP",$resultado2);
    echo '</td>';
    echo '</tr>';

}

?>

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
    <main>
        <form action="index.php?controlador=ControladorHorario&metodo=guardarhorario" method="post">
            <table cellspacing="0px">
                <?php echo '<legend><h1>horario de '.$_POST['curso'].'</h1></legend>'?>
                <thead>
                    <tr>
                        <th></th>
                        <th>Lunes</th>
                        <th>Martes</th>
                        <th>Miercoles</th>
                        <th>Jueves</th>
                        <th>Viernes</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  crearAltaHorarios($datos[0], $datos[1]); ?>
                </tbody>
            </table>
            <input type="text" name="curso" value="<?php echo $_POST['curso'] ?>" hidden>
            <input type="submit" value="Enviar">
        </form>
    </main>
</body>
</html>