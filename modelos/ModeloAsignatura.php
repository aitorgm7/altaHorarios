<?php

require_once __DIR__ . '/Conexion.php';

class ModeloAsignatura extends Conexion {

    public function __construct() {
        parent::__construct();
    }

    /**
     * devuelve todas las asignaturas con el profesor y curso
     */
    public function devolverAsignaturas() {
        $sql = "SELECT A.idAsignaturas, A.nombre AS asignatura, A.n_horas,
                       C.idCurso, C.idCurso AS curso,
                       P.idProfesor, P.nombre AS profesor
                FROM Asignaturas A
                LEFT JOIN PRO_ASIG_CUR PAC ON A.idAsignaturas = PAC.idAsignatura
                LEFT JOIN Cursos C ON PAC.idCurso = C.idCurso
                LEFT JOIN Profesores P ON PAC.idProfesor = P.idProfesor
                ORDER BY C.idCurso, A.idAsignaturas ";
        return $this->conexion->query($sql);
    }

    /**
     * devuelve todas las asignaturas de un curso
     */
    function cogerAsignaturasCurso() {
        $sql = "SELECT A.idAsignaturas AS siglas
                FROM PRO_ASIG_CUR PAC
                INNER JOIN Asignaturas A ON PAC.idAsignatura = A.idAsignaturas
                WHERE PAC.idCurso='".$_POST['curso']."'";
        return $this->conexion->query($sql);
    }
}
?>