<?php

require_once __DIR__ . '/Conexion.php';

class ModeloProfesor extends Conexion {

    public function __construct() {
        parent::__construct();
    }
    /**
     * devuelve todos los profesores
     */
    function mostrarProfesores() {
        $sql = "SELECT P.idProfesor, P.nombre
                FROM Profesores P";
        return $this->conexion->query($sql);
    }

    /**
     * devuelve solo los profesores de cierto curso
     */
    function cogerProfesoresCurso() {
        $sql = "SELECT P.idProfesor, P.nombre
                FROM PRO_ASIG_CUR PAC
                INNER JOIN Profesores P ON PAC.idProfesor = P.idProfesor
                WHERE PAC.idCurso='".$_POST['curso']."'";
        return $this->conexion->query($sql);
    }

}

?>