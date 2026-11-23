<?php

require_once __DIR__ . '/Conexion.php';

class ModeloHorario extends Conexion {

    public function __construct() {
        parent::__construct();
    }

    function agregarHora($idHora,$idCurso,$idAsignatura,$idProfesor,$hora,$dia){
        $sql = 'INSERT INTO horarios (idHora,idCurso,idAsignatura,idProfesor,hora,dia) 
                VALUE ("'.$idHora.'","'.$idCurso.'","'.$idAsignatura.'","'.$idProfesor.'","'.$hora.'","'.$dia.'")';
        $this->conexion->query($sql);
    }

    /**
     *  saca todas las horas de un horario
     */
    function darHorario(){
        $sql = 'SELECT  h.idAsignatura, nombre
                FROM horarios h
                LEFT JOIN PRO_ASIG_CUR pac
                    ON  pac.idCurso      = h.idCurso
                    AND pac.idProfesor   = h.idProfesor
                    AND pac.idAsignatura = h.idAsignatura
                INNER JOIN profesores p
                    ON p.idProfesor = h.idProfesor
                WHERE h.idCurso="'.$_POST['idCurso'].'"';
        return $this->conexion->query($sql);
    }

    /**
     * guarda hora a hora el horario
     */
    function guardarHorario(){
        $this->conexion->begin_transaction();
        $c=1;
        $dia=["L","M","X","J","V"];
        print_r($_POST["LA"]);
        print_r($_POST["MA"]);
        try {
           for($i=0;$i<7;$i++){ 
                for($f=0;$f<5;$f++){
                    $this->agregarHora($c,$_POST['curso'],$_POST[$dia[$f]."A"][$i],$_POST[$dia[$f]."P"][$i],$i,$f);
                    if($i==6) $f=5;
                    $c++;
                }
            }
            $this->conexion->commit();
            return "el horario has sido guardado con exito";
        } catch (mysqli_sql_exception $e) {
            $this->conexion->rollback();
            switch ($e->getCode()) {
                case 1062: // Duplicado
                    return "Un profesor tiene ya ocupada la hora asignada.";
                case 1644: // trigger n_horas
                    return $e->getMessage();
                default:
                    // Error no controlado: no expone detalles al usuario
                    return "No se pudo guardar el horario. Contacte con el administrador.";
            }
        }
    }
}
?>