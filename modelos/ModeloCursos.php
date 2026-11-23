<?php

require 'Conexion.php';

class ModeloCursos extends Conexion {

    public function __construct() {
        parent::__construct();
    }

    /**
     * devuelve todos los cursos
     */
    public function devolverCursos() {
        return $this->conexion->query("SELECT idCurso, nombre FROM Cursos");
    }

    /**
     * devuelve los cursos sin horario
     */
    function devolverCursosSinHorario(){
        $sql="SELECT cursos.idCurso, nombre
              FROM cursos
              LEFT JOIN horarios ON horarios.idCurso = cursos.idCurso
              WHERE horarios.idCurso IS NULL;";
        return $this->conexion->query($sql);
    }

    /**
     * devuelve todos los cursos con horario
     */
    function devolverCursosConHorario(){
        $sql="SELECT distinct cursos.idCurso, nombre
              FROM cursos
              inner JOIN horarios ON horarios.idCurso = cursos.idCurso;";
        return $this->conexion->query($sql);
    }
}
?>